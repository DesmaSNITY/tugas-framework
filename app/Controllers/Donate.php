<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\DonationModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use DateTimeImmutable;
use RuntimeException;
use Throwable;

class Donate extends BaseController
{
    private const PAYMENT_TIMEOUT_MINUTES = 15;

    protected DonationModel $donationModel;
    protected TransactionModel $transactionModel;
    protected UserModel $userModel;

    public function __construct()
    {
        $this->donationModel    = new DonationModel();
        $this->transactionModel = new TransactionModel();
        $this->userModel        = new UserModel();
    }

    /**
     * Menampilkan seluruh program donasi yang masih tersedia.
     */
    public function index(): string
    {
        $selectedCategory = trim(
            (string) $this->request->getGet('category')
        );

        try {
            $rows = $this->donationModel->getForDonatePage(
                $selectedCategory !== ''
                    ? $selectedCategory
                    : null
            );

            $programs = array_map(
                fn (array $program): array =>
                    $this->prepareProgram($program),
                $rows
            );

            return view('donate/index', [
                'title'            => 'Program Donasi',
                'programs'         => $programs,
                'selectedCategory' => $selectedCategory,
                'databaseError'    => null,
            ]);
        } catch (Throwable $exception) {
            log_message(
                'error',
                'Program donasi gagal dimuat: {message}',
                [
                    'message' => $exception->getMessage(),
                ]
            );

            return view('donate/index', [
                'title'            => 'Program Donasi',
                'programs'         => [],
                'selectedCategory' => $selectedCategory,
                'databaseError'    => ENVIRONMENT === 'development'
                    ? $exception->getMessage()
                    : 'Program donasi gagal dimuat.',
            ]);
        }
    }

    /**
     * Menampilkan form checkout donasi.
     */
    public function checkout($id)
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $program = $this->prepareProgram(
            $this->findProgram((int) $id)
        );

        $remainingAmount = max(
            0,
            (int) $program['remaining_amount']
        );

        $status = strtolower(
            trim((string) ($program['status'] ?? ''))
        );

        if (
            $status === 'finished'
            || $remainingAmount <= 0
        ) {
            return redirect()->to('/donate')
                ->with(
                    'error',
                    'Program donasi sudah selesai dan tidak menerima donasi lagi.'
                );
        }

        return view('donate/checkout', [
            'title'   => 'Checkout Donasi',
            'program' => $program,
            'donor'   => $this->getAccountData($user),
        ]);
    }

    /**
     * Membuat transaksi pending setelah data checkout dikonfirmasi.
     */
    public function store()
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $rules = [
            'donationpost_id' => [
                'label' => 'Program donasi',
                'rules' => 'required|integer|greater_than[0]',
            ],
            'amount' => [
                'label' => 'Nominal donasi',
                'rules' => 'required|integer|greater_than[0]',
            ],
            'donor_city' => [
                'label' => 'Domisili',
                'rules' => 'permit_empty|max_length[100]',
            ],
            'message' => [
                'label' => 'Pesan dan doa',
                'rules' => 'permit_empty|max_length[200]',
            ],
            'confirmed' => [
                'label' => 'Konfirmasi data',
                'rules' => 'required|in_list[1]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        $programId = (int) $this->request->getPost(
            'donationpost_id'
        );

        $amount = (int) $this->request->getPost('amount');

        $message = trim(
            (string) $this->request->getPost('message')
        );

        $donorCity = trim(
            (string) $this->request->getPost('donor_city')
        );

        $showName = $this->request->getPost('show_name') === '1'
            ? 1
            : 0;

        $db = db_connect();

        try {
            $db->transBegin();

            $program = $db->query(
                'SELECT id, target_amount, current_amount, status
                 FROM donationposts
                 WHERE id = ?
                 FOR UPDATE',
                [$programId]
            )->getRowArray();

            if ($program === null) {
                throw new RuntimeException(
                    'Program donasi tidak ditemukan.'
                );
            }

            $targetAmount = max(
                0,
                (int) ($program['target_amount'] ?? 0)
            );

            $currentAmount = max(
                0,
                (int) ($program['current_amount'] ?? 0)
            );

            $remainingAmount = max(
                0,
                $targetAmount - $currentAmount
            );

            $programStatus = strtolower(
                trim((string) ($program['status'] ?? ''))
            );

            if (
                $programStatus === 'finished'
                || $remainingAmount <= 0
            ) {
                throw new RuntimeException(
                    'Program donasi sudah selesai.'
                );
            }

            if ($amount > $remainingAmount) {
                throw new RuntimeException(
                    'Nominal donasi melebihi sisa target Rp'
                    . number_format(
                        $remainingAmount,
                        0,
                        ',',
                        '.'
                    )
                    . '.'
                );
            }

            $insertResult = $this->transactionModel->insert(
                [
                    'user_id'         => (int) $user['id'],
                    'donationpost_id' => $programId,
                    'amount'          => $amount,
                    'message'         => $message !== ''
                        ? $message
                        : null,
                    'donor_city'      => $donorCity !== ''
                        ? $donorCity
                        : null,
                    'show_name'       => $showName,
                    'payment_method'  => 'pending',
                    'status'          => 'pending',
                ],
                true
            );

            if ($insertResult === false) {
                $modelErrors = $this->transactionModel->errors();

                throw new RuntimeException(
                    $modelErrors !== []
                        ? implode(', ', $modelErrors)
                        : 'Transaksi gagal dibuat.'
                );
            }

            $transactionId = (int) $insertResult;

            if ($transactionId <= 0) {
                throw new RuntimeException(
                    'ID transaksi tidak berhasil dibuat.'
                );
            }

            if ($db->transStatus() === false) {
                throw new RuntimeException(
                    'Transaksi database gagal diselesaikan.'
                );
            }

            $db->transCommit();

            return redirect()->to(
                '/donate/confirm/' . $transactionId
            );
        } catch (Throwable $exception) {
            $db->transRollback();

            log_message(
                'error',
                'Pembuatan transaksi program {id} gagal: {message}',
                [
                    'id'      => $programId,
                    'message' => $exception->getMessage(),
                ]
            );

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    ENVIRONMENT === 'development'
                        ? $exception->getMessage()
                        : 'Transaksi gagal dibuat.'
                );
        }
    }

    /**
     * Menampilkan halaman konfirmasi dan metode pembayaran.
     */
    public function confirm($id)
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $transactionId = (int) $id;

        $transaction = $this->findOwnedTransaction(
            $transactionId,
            (int) $user['id']
        );

        if ($transaction === null) {
            throw PageNotFoundException::forPageNotFound(
                'Transaksi tidak ditemukan.'
            );
        }

        $status = strtolower(
            trim((string) ($transaction['status'] ?? ''))
        );

        if ($status === 'success') {
            return redirect()->to(
                '/donate/success/' . $transactionId
            );
        }

        if ($status === 'failed') {
            return redirect()->to(
                '/donate/failed/' . $transactionId
            );
        }

        if ($this->isExpired($transaction)) {
            $this->transactionModel->markAsFailed(
                $transactionId,
                (int) $user['id']
            );

            return redirect()
                ->to('/donate/failed/' . $transactionId)
                ->with(
                    'failure_reason',
                    'Batas pembayaran 15 menit telah berakhir.'
                );
        }

        $program = $this->prepareProgram(
            $this->findProgram(
                (int) $transaction['donationpost_id']
            )
        );

        $account = $this->getAccountData($user);

        return view('donate/confirm', [
            'title'      => 'Pembayaran Donasi',
            'donation'   => $transaction,
            'program'    => $program,
            'donorName'  => $account['name'],
            'donorEmail' => $account['email'],
            'expiresAt'  => $this
                ->paymentExpiry($transaction)
                ->format(DATE_ATOM),
        ]);
    }

    /**
     * Memproses pembayaran simulasi.
     */
    public function pay($id)
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $rules = [
            'payment_method' => [
                'label' => 'Metode pembayaran',
                'rules' => [
                    'required',
                    'in_list[QRIS,BCA,Mandiri,BNI,BRI,GoPay]',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        $transactionId = (int) $id;
        $userId        = (int) $user['id'];

        $paymentMethod = trim(
            (string) $this->request->getPost(
                'payment_method'
            )
        );

        $db = db_connect();

        try {
            $db->transBegin();

            $transaction = $db->query(
                'SELECT *
                 FROM transactions
                 WHERE id = ?
                 FOR UPDATE',
                [$transactionId]
            )->getRowArray();

            if (
                $transaction === null
                || (int) ($transaction['user_id'] ?? 0) !== $userId
            ) {
                throw new RuntimeException(
                    'Transaksi tidak ditemukan.'
                );
            }

            $transactionStatus = strtolower(
                trim((string) ($transaction['status'] ?? ''))
            );

            if ($transactionStatus === 'success') {
                $db->transCommit();

                return redirect()->to(
                    '/donate/success/' . $transactionId
                );
            }

            if ($transactionStatus === 'failed') {
                $db->transCommit();

                return redirect()->to(
                    '/donate/failed/' . $transactionId
                );
            }

            if ($this->isExpired($transaction)) {
                $failedUpdated = $db
                    ->table('transactions')
                    ->where('id', $transactionId)
                    ->where('user_id', $userId)
                    ->update([
                        'status'     => 'failed',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                if (
                    ! $failedUpdated
                    || $db->transStatus() === false
                ) {
                    throw new RuntimeException(
                        'Status transaksi gagal diperbarui.'
                    );
                }

                $db->transCommit();

                return redirect()
                    ->to('/donate/failed/' . $transactionId)
                    ->with(
                        'failure_reason',
                        'Batas pembayaran 15 menit telah berakhir.'
                    );
            }

            $programId = (int) (
                $transaction['donationpost_id'] ?? 0
            );

            $program = $db->query(
                'SELECT *
                 FROM donationposts
                 WHERE id = ?
                 FOR UPDATE',
                [$programId]
            )->getRowArray();

            if ($program === null) {
                throw new RuntimeException(
                    'Program donasi tidak ditemukan.'
                );
            }

            $targetAmount = max(
                0,
                (int) ($program['target_amount'] ?? 0)
            );

            $currentAmount = max(
                0,
                (int) ($program['current_amount'] ?? 0)
            );

            $remainingAmount = max(
                0,
                $targetAmount - $currentAmount
            );

            $transactionAmount = max(
                0,
                (int) ($transaction['amount'] ?? 0)
            );

            $programStatus = strtolower(
                trim((string) ($program['status'] ?? ''))
            );

            if (
                $programStatus === 'finished'
                || $transactionAmount <= 0
                || $transactionAmount > $remainingAmount
            ) {
                $failedUpdated = $db
                    ->table('transactions')
                    ->where('id', $transactionId)
                    ->where('user_id', $userId)
                    ->update([
                        'status'     => 'failed',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                if (
                    ! $failedUpdated
                    || $db->transStatus() === false
                ) {
                    throw new RuntimeException(
                        'Status transaksi gagal diperbarui.'
                    );
                }

                $db->transCommit();

                return redirect()
                    ->to('/donate/failed/' . $transactionId)
                    ->with(
                        'failure_reason',
                        'Target program telah terpenuhi atau sisa target tidak mencukupi.'
                    );
            }

            $newCurrentAmount = min(
                $currentAmount + $transactionAmount,
                $targetAmount
            );

            $newProgramStatus =
                $newCurrentAmount >= $targetAmount
                    ? 'finished'
                    : (
                        trim(
                            (string) ($program['status'] ?? '')
                        ) !== ''
                            ? (string) $program['status']
                            : 'active'
                    );

            $transactionUpdated = $db
                ->table('transactions')
                ->where('id', $transactionId)
                ->where('user_id', $userId)
                ->where('status', 'pending')
                ->update([
                    'payment_method' => $paymentMethod,
                    'status'         => 'success',
                    'updated_at'     => date('Y-m-d H:i:s'),
                ]);

            $programUpdated = $db
                ->table('donationposts')
                ->where('id', $programId)
                ->update([
                    'current_amount' => $newCurrentAmount,
                    'status'         => $newProgramStatus,
                    'updated_at'     => date('Y-m-d H:i:s'),
                ]);

            if (
                ! $transactionUpdated
                || ! $programUpdated
                || $db->transStatus() === false
            ) {
                throw new RuntimeException(
                    'Pembayaran gagal disimpan.'
                );
            }

            $db->transCommit();

            return redirect()->to(
                '/donate/success/' . $transactionId
            );
        } catch (Throwable $exception) {
            $db->transRollback();

            log_message(
                'error',
                'Pembayaran transaksi {id} gagal: {message}',
                [
                    'id'      => $transactionId,
                    'message' => $exception->getMessage(),
                ]
            );

            return redirect()->back()->with(
                'error',
                ENVIRONMENT === 'development'
                    ? $exception->getMessage()
                    : 'Pembayaran gagal diproses.'
            );
        }
    }

    /**
     * Menandai transaksi pending sebagai gagal setelah kedaluwarsa.
     */
    public function expire($id)
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $transactionId = (int) $id;
        $userId        = (int) $user['id'];

        $transaction = $this->findOwnedTransaction(
            $transactionId,
            $userId
        );

        if ($transaction === null) {
            throw PageNotFoundException::forPageNotFound(
                'Transaksi tidak ditemukan.'
            );
        }

        $status = strtolower(
            trim((string) ($transaction['status'] ?? ''))
        );

        if ($status === 'success') {
            return redirect()->to(
                '/donate/success/' . $transactionId
            );
        }

        if ($status === 'failed') {
            return redirect()->to(
                '/donate/failed/' . $transactionId
            );
        }

        if (! $this->isExpired($transaction)) {
            return redirect()->to(
                '/donate/confirm/' . $transactionId
            );
        }

        $this->transactionModel->markAsFailed(
            $transactionId,
            $userId
        );

        return redirect()
            ->to('/donate/failed/' . $transactionId)
            ->with(
                'failure_reason',
                'Batas pembayaran 15 menit telah berakhir.'
            );
    }

    /**
     * Menampilkan halaman transaksi berhasil.
     */
    public function success($id)
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $transactionId = (int) $id;

        $transaction = $this->findOwnedTransaction(
            $transactionId,
            (int) $user['id']
        );

        if (
            $transaction === null
            || strtolower(
                trim((string) ($transaction['status'] ?? ''))
            ) !== 'success'
        ) {
            return redirect()->to('/donate');
        }

        $program = $this->prepareProgram(
            $this->findProgram(
                (int) $transaction['donationpost_id']
            )
        );

        $account = $this->getAccountData($user);

        return view('donate/success', [
            'title'     => 'Donasi Berhasil',
            'donation'  => $transaction,
            'program'   => $program,
            'donorName' => $account['name'],
        ]);
    }

    /**
     * Menampilkan halaman transaksi gagal.
     */
    public function failed($id)
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $transactionId = (int) $id;
        $userId        = (int) $user['id'];

        $transaction = $this->findOwnedTransaction(
            $transactionId,
            $userId
        );

        if ($transaction === null) {
            return redirect()->to('/donate');
        }

        $status = strtolower(
            trim((string) ($transaction['status'] ?? ''))
        );

        if ($status === 'success') {
            return redirect()->to(
                '/donate/success/' . $transactionId
            );
        }

        if (
            $status === 'pending'
            && ! $this->isExpired($transaction)
        ) {
            return redirect()->to(
                '/donate/confirm/' . $transactionId
            );
        }

        if ($status === 'pending') {
            $this->transactionModel->markAsFailed(
                $transactionId,
                $userId
            );

            $transaction['status'] = 'failed';
        }

        return view('donate/failed', [
            'title'    => 'Pembayaran Gagal',
            'donation' => $transaction,
        ]);
    }

    /**
     * Menampilkan riwayat donasi pengguna.
     */
    public function history()
    {
        $user = $this->getAuthenticatedUser();

        if ($user === null) {
            return $this->redirectToLogin();
        }

        $userId = (int) $user['id'];

        $this->transactionModel->expirePendingByUser(
            $userId,
            self::PAYMENT_TIMEOUT_MINUTES
        );

        $donations = $this->transactionModel
            ->getHistoryByUser($userId);

        foreach ($donations as &$donation) {
            $donation['picture_url'] = $this->getPictureUrl(
                (string) ($donation['picture'] ?? '')
            );
        }

        unset($donation);

        return view('donate/history', [
            'title'     => 'Donasi Saya',
            'donations' => $donations,
        ]);
    }

    /**
     * Mengambil program beserta data yayasan.
     */
    private function findProgram(int $id): array
    {
        if ($id <= 0) {
            throw PageNotFoundException::forPageNotFound(
                'Program donasi tidak ditemukan.'
            );
        }

        $program = $this->donationModel
            ->getWithFoundationById($id);

        if ($program === null) {
            throw PageNotFoundException::forPageNotFound(
                'Program donasi tidak ditemukan.'
            );
        }

        return $program;
    }

    /**
     * Mengambil transaksi berdasarkan ID dan pemiliknya.
     */
    private function findOwnedTransaction(
        int $transactionId,
        int $userId
    ): ?array {
        if ($transactionId <= 0 || $userId <= 0) {
            return null;
        }

        return $this->transactionModel->findOwned(
            $transactionId,
            $userId
        );
    }

    /**
     * Mengambil pengguna login dari session dan tabel users.
     *
     * Tidak menggunakan CodeIgniter Shield.
     */
    private function getAuthenticatedUser(): ?array
    {
        $session = session();

        $isLoggedIn = (bool) $session->get(
            'is_logged_in'
        );

        $userId = (int) $session->get('user_id');

        if (! $isLoggedIn || $userId <= 0) {
            return null;
        }

        $user = $this->userModel->find($userId);

        if (
            ! is_array($user)
            || (int) ($user['active'] ?? 0) !== 1
        ) {
            $this->clearAuthenticationSession();

            return null;
        }

        return $user;
    }

    /**
     * Menghapus session autentikasi yang sudah tidak valid.
     */
    private function clearAuthenticationSession(): void
    {
        session()->remove([
            'is_logged_in',
            'user_id',
            'username',
            'email',
            'role',
        ]);
    }

    /**
     * Redirect pengguna ke login.
     */
    private function redirectToLogin()
    {
        return redirect()->to('/login')
            ->with(
                'error',
                'Silakan login terlebih dahulu.'
            );
    }

    /**
     * Menyiapkan data akun untuk dikirim ke view.
     */
    private function getAccountData(array $user): array
    {
        $name = trim(
            (string) ($user['first_name'] ?? '')
            . ' '
            . (string) ($user['last_name'] ?? '')
        );

        if ($name === '') {
            $name = trim(
                (string) ($user['username'] ?? '')
            );
        }

        if ($name === '') {
            $name = 'Pengguna';
        }

        return [
            'name'  => $name,
            'email' => trim(
                (string) ($user['email'] ?? '')
            ),
            'phone' => trim(
                (string) ($user['phone'] ?? '')
            ),
        ];
    }

    /**
     * Menentukan waktu kedaluwarsa transaksi.
     */
    private function paymentExpiry(
        array $transaction
    ): DateTimeImmutable {
        $createdAt = trim(
            (string) ($transaction['created_at'] ?? '')
        );

        if ($createdAt === '') {
            $createdAt = '1970-01-01 00:00:00';
        }

        $createdDate = new DateTimeImmutable($createdAt);

        return $createdDate->modify(
            '+'
            . self::PAYMENT_TIMEOUT_MINUTES
            . ' minutes'
        );
    }

    /**
     * Memeriksa apakah transaksi sudah kedaluwarsa.
     */
    private function isExpired(array $transaction): bool
    {
        try {
            return new DateTimeImmutable()
                >= $this->paymentExpiry($transaction);
        } catch (Throwable $exception) {
            log_message(
                'error',
                'Waktu transaksi tidak valid: {message}',
                [
                    'message' => $exception->getMessage(),
                ]
            );

            return true;
        }
    }

    /**
     * Menyiapkan program untuk ditampilkan pada view.
     */
    private function prepareProgram(
        array $program
    ): array {
        $targetAmount = max(
            0,
            (int) ($program['target_amount'] ?? 0)
        );

        $currentAmount = max(
            0,
            (int) ($program['current_amount'] ?? 0)
        );

        if ($targetAmount > 0) {
            $currentAmount = min(
                $currentAmount,
                $targetAmount
            );
        }

        $progress = $targetAmount > 0
            ? (int) round(
                ($currentAmount / $targetAmount) * 100
            )
            : 0;

        $deadline = $this->getDeadlineInformation(
            (string) ($program['deadline'] ?? '')
        );

        $program['target_amount'] = $targetAmount;

        $program['current_amount'] = $currentAmount;

        $program['remaining_amount'] = max(
            0,
            $targetAmount - $currentAmount
        );

        $program['progress'] = max(
            0,
            min(100, $progress)
        );

        $program['donor_count'] = max(
            0,
            (int) ($program['donor_count'] ?? 0)
        );

        $program['category'] = trim(
            (string) ($program['category'] ?? '')
        ) ?: 'Umum';

        $program['status'] = trim(
            (string) ($program['status'] ?? '')
        ) ?: 'active';

        $program['foundation_name'] = trim(
            (string) ($program['foundation_name'] ?? '')
        ) ?: 'Yayasan belum tersedia';

        $program['foundation_location'] = trim(
            (string) ($program['foundation_location'] ?? '')
        ) ?: '-';

        $program['picture_url'] = $this->getPictureUrl(
            (string) ($program['picture'] ?? '')
        );

        $program['days_left'] = $deadline['days_left'];

        $program['deadline_label'] = $deadline['label'];

        return $program;
    }

    /**
     * Mengubah nama file gambar menjadi URL publik.
     */
    private function getPictureUrl(
        string $picture
    ): ?string {
        $picture = trim($picture);

        if ($picture === '') {
            return null;
        }

        if (preg_match('#^https?://#i', $picture)) {
            return $picture;
        }

        $fileName = basename(
            str_replace('\\', '/', $picture)
        );

        if ($fileName === '' || $fileName === '.') {
            return null;
        }

        $absolutePath = FCPATH
            . 'uploads'
            . DIRECTORY_SEPARATOR
            . 'donationprogram'
            . DIRECTORY_SEPARATOR
            . $fileName;

        if (! is_file($absolutePath)) {
            return null;
        }

        return base_url(
            'uploads/donationprogram/'
            . rawurlencode($fileName)
        );
    }

    /**
     * Mengubah deadline menjadi informasi hari tersisa.
     */
    private function getDeadlineInformation(
        string $deadline
    ): array {
        $deadline = trim($deadline);

        if ($deadline === '') {
            return [
                'days_left' => null,
                'label'     => 'Tanpa batas waktu',
            ];
        }

        try {
            $today = new DateTimeImmutable('today');

            $deadlineDate = new DateTimeImmutable(
                $deadline
            );

            $days = (int) $today
                ->diff($deadlineDate)
                ->format('%r%a');

            if ($days < 0) {
                return [
                    'days_left' => 0,
                    'label'     => 'Program berakhir',
                ];
            }

            if ($days === 0) {
                return [
                    'days_left' => 0,
                    'label'     => 'Berakhir hari ini',
                ];
            }

            return [
                'days_left' => $days,
                'label'     => $days . ' Hari lagi',
            ];
        } catch (Throwable $exception) {
            log_message(
                'error',
                'Deadline program tidak valid: {message}',
                [
                    'message' => $exception->getMessage(),
                ]
            );

            return [
                'days_left' => null,
                'label'     => 'Batas waktu tidak tersedia',
            ];
        }
    }
}