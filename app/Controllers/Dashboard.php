<?php

declare(strict_types=1);

namespace App\Controllers;

use DateTimeImmutable;
use Throwable;

class Dashboard extends BaseController
{
    /**
     * Menampilkan laporan donasi dan pengeluaran.
     *
     * Autentikasi menggunakan session aplikasi sendiri,
     * tanpa CodeIgniter Shield.
     */
    public function laporan()
    {
        $userId = (int) session()->get('user_id');

        if (
            session()->get('is_logged_in') !== true
            || $userId <= 0
        ) {
            return redirect()->to('/login')
                ->with(
                    'error',
                    'Silakan login terlebih dahulu.'
                );
        }

        $data = [
            'title'            => 'Laporan Donasi',
            'totalIncome'      => 0,
            'totalExpense'     => 0,
            'saldo'            => 0,
            'donorCount'       => 0,
            'totalPrograms'    => 0,
            'totalTarget'      => 0,
            'chartData'        => $this->emptyChartData(),
            'recentActivities' => [],
            'databaseError'    => null,
        ];

        $db = db_connect();

        try {
            /*
             * Status transaksi berhasil.
             * "paid" tetap dibaca untuk kompatibilitas data lama.
             */
            $successfulTransactionStatuses = [
                'success',
                'paid',
            ];

            /*
             * Status pengeluaran yang sudah benar-benar dilakukan.
             */
            $completedExpenseStatuses = [
                'paid',
                'success',
                'completed',
            ];

            /*
             * Total donasi berhasil.
             */
            $incomeRow = $db
                ->table('transactions')
                ->selectSum('amount', 'total_income')
                ->whereIn(
                    'status',
                    $successfulTransactionStatuses
                )
                ->get()
                ->getRowArray();

            $totalIncome = max(
                0,
                (int) ($incomeRow['total_income'] ?? 0)
            );

            /*
             * Total pengeluaran yang sudah disalurkan.
             */
            $expenseRow = $db
                ->table('expenses')
                ->selectSum('amount', 'total_expense')
                ->whereIn(
                    'status',
                    $completedExpenseStatuses
                )
                ->get()
                ->getRowArray();

            $totalExpense = max(
                0,
                (int) ($expenseRow['total_expense'] ?? 0)
            );

            /*
             * Jumlah donatur unik dari transaksi berhasil.
             */
            $donorRow = $db
                ->table('transactions')
                ->select(
                    'COUNT(DISTINCT user_id) AS total_donors',
                    false
                )
                ->whereIn(
                    'status',
                    $successfulTransactionStatuses
                )
                ->get()
                ->getRowArray();

            $donorCount = max(
                0,
                (int) ($donorRow['total_donors'] ?? 0)
            );

            /*
             * Jumlah program yang masih aktif.
             */
            $totalPrograms = $db
                ->table('donationposts')
                ->where('status', 'active')
                ->countAllResults();

            /*
             * Total target seluruh program.
             */
            $targetRow = $db
                ->table('donationposts')
                ->selectSum('target_amount', 'total_target')
                ->get()
                ->getRowArray();

            $totalTarget = max(
                0,
                (int) ($targetRow['total_target'] ?? 0)
            );

            /*
             * Grafik donasi berhasil tahun berjalan.
             */
            $chartData = $this->buildChartData(
                $db,
                $successfulTransactionStatuses
            );

            /*
             * Ambil aktivitas donasi dan pengeluaran,
             * kemudian gabungkan berdasarkan waktu terbaru.
             */
            $recentActivities = $this->getRecentActivities(
                $db
            );

            $data = array_merge(
                $data,
                [
                    'totalIncome'      => $totalIncome,
                    'totalExpense'     => $totalExpense,
                    'saldo'            => $totalIncome - $totalExpense,
                    'donorCount'       => $donorCount,
                    'totalPrograms'    => max(
                        0,
                        (int) $totalPrograms
                    ),
                    'totalTarget'      => $totalTarget,
                    'chartData'        => $chartData,
                    'recentActivities' => $recentActivities,
                ]
            );
        } catch (Throwable $exception) {
            log_message(
                'error',
                'Dashboard laporan gagal dimuat: {message}',
                [
                    'message' => $exception->getMessage(),
                ]
            );

            $data['databaseError'] =
                ENVIRONMENT === 'development'
                    ? $exception->getMessage()
                    : 'Data laporan belum dapat dimuat.';
        }

        return view('dashboard/laporan', $data);
    }

    /**
     * Membuat data grafik donasi per bulan.
     */
    private function buildChartData(
        $db,
        array $successfulStatuses
    ): array {
        $chartData = $this->emptyChartData();

        $currentYear = (int) date('Y');

        $startDate = sprintf(
            '%04d-01-01 00:00:00',
            $currentYear
        );

        $endDate = sprintf(
            '%04d-01-01 00:00:00',
            $currentYear + 1
        );

        $rows = $db
            ->table('transactions')
            ->select([
                'amount',
                'created_at',
            ])
            ->whereIn('status', $successfulStatuses)
            ->where('created_at >=', $startDate)
            ->where('created_at <', $endDate)
            ->get()
            ->getResultArray();

        $monthNames = array_keys($chartData);

        foreach ($rows as $row) {
            $createdAt = trim(
                (string) ($row['created_at'] ?? '')
            );

            if ($createdAt === '') {
                continue;
            }

            try {
                $date = new DateTimeImmutable($createdAt);
                $monthNumber = (int) $date->format('n');

                if (
                    $monthNumber < 1
                    || $monthNumber > 12
                ) {
                    continue;
                }

                $monthName = $monthNames[
                    $monthNumber - 1
                ];

                $chartData[$monthName] += max(
                    0,
                    (int) ($row['amount'] ?? 0)
                );
            } catch (Throwable $exception) {
                log_message(
                    'warning',
                    'Tanggal transaksi tidak valid: {message}',
                    [
                        'message' => $exception->getMessage(),
                    ]
                );
            }
        }

        return $chartData;
    }

    /**
     * Menggabungkan 10 aktivitas donasi dan pengeluaran terbaru.
     */
    private function getRecentActivities($db): array
    {
        /*
         * Transaksi donasi terbaru.
         *
         * show_name:
         * - 1 = tampilkan nama pengguna;
         * - 0 = tampilkan "Anonim".
         */
        $donationRows = $db
            ->table('transactions t')
            ->select([
                't.id',
                't.amount',
                't.payment_method',
                't.status',
                't.show_name',
                't.created_at',
                'dp.title AS program_title',
                'f.name AS foundation_name',
                'u.username',
                'u.first_name',
                'u.last_name',
            ])
            ->join(
                'donationposts dp',
                'dp.id = t.donationpost_id',
                'left'
            )
            ->join(
                'foundations f',
                'f.id = dp.foundation_id',
                'left'
            )
            ->join(
                'users u',
                'u.id = t.user_id',
                'left'
            )
            ->orderBy('t.created_at', 'DESC')
            ->limit(20)
            ->get()
            ->getResultArray();

        $activities = [];

        foreach ($donationRows as $row) {
            $fullName = trim(
                (string) ($row['first_name'] ?? '')
                . ' '
                . (string) ($row['last_name'] ?? '')
            );

            if ($fullName === '') {
                $fullName = trim(
                    (string) ($row['username'] ?? '')
                );
            }

            if ($fullName === '') {
                $fullName = 'Pengguna';
            }

            $showName = (int) (
                $row['show_name'] ?? 0
            ) === 1;

            $activities[] = [
                'id'              => (int) ($row['id'] ?? 0),
                'type'            => 'donation',
                'type_label'      => 'Donasi',
                'actor_label'     => 'Donatur',
                'actor_name'      => $showName
                    ? $fullName
                    : 'Anonim',
                'program_title'   => (string) (
                    $row['program_title']
                    ?? 'Program donasi'
                ),
                'foundation_name' => (string) (
                    $row['foundation_name']
                    ?? 'Yayasan belum tersedia'
                ),
                'amount'          => max(
                    0,
                    (int) ($row['amount'] ?? 0)
                ),
                'detail'          => $this->normalizePaymentMethod(
                    (string) ($row['payment_method'] ?? '')
                ),
                'status'          => strtolower(
                    trim((string) ($row['status'] ?? 'pending'))
                ),
                'created_at'      => (string) (
                    $row['created_at'] ?? ''
                ),
            ];
        }

        /*
         * Pengeluaran terbaru.
         *
         * beneficary mengikuti nama kolom database Anda.
         */
        $expenseRows = $db
    ->table('expenses e')
    ->select([
        'e.id',
        'e.amount',
        'e.beneficiary',
        'e.status',
        'e.created_at',
        'dp.title AS program_title',
        'f.name AS foundation_name',
    ])
    ->join(
        'donationposts dp',
        'dp.id = e.donationpost_id',
        'left'
    )
    ->join(
        'foundations f',
        'f.id = dp.foundation_id',
        'left'
    )
    ->orderBy('e.created_at', 'DESC')
    ->limit(20)
    ->get()
    ->getResultArray();

        foreach ($expenseRows as $row) {
            $foundationName = trim(
                (string) ($row['foundation_name'] ?? '')
            );

            if ($foundationName === '') {
                $foundationName = 'Yayasan belum tersedia';
            }
            $beneficiary = trim(
    (string) ($row['beneficiary'] ?? '')
);

if ($beneficiary === '') {
    $beneficiary = 'Penerima belum dicatat';
}

            $activities[] = [
                'id'              => (int) ($row['id'] ?? 0),
                'type'            => 'expense',
                'type_label'      => 'Pengeluaran',
                'actor_label'     => 'Yayasan',
                'actor_name'      => $foundationName,
                'program_title'   => (string) (
                    $row['program_title']
                    ?? 'Program donasi'
                ),
                'foundation_name' => $foundationName,
                'amount'          => max(
                    0,
                    (int) ($row['amount'] ?? 0)
                ),
                'detail' => 'Penerima: ' . $beneficiary,
                'status'          => strtolower(
                    trim((string) ($row['status'] ?? 'pending'))
                ),
                'created_at'      => (string) (
                    $row['created_at'] ?? ''
                ),
            ];
        }

        usort(
            $activities,
            static function (
                array $first,
                array $second
            ): int {
                $firstTime = strtotime(
                    (string) ($first['created_at'] ?? '')
                ) ?: 0;

                $secondTime = strtotime(
                    (string) ($second['created_at'] ?? '')
                ) ?: 0;

                return $secondTime <=> $firstTime;
            }
        );

        return array_slice($activities, 0, 10);
    }

    /**
     * Membersihkan nama metode pembayaran.
     */
    private function normalizePaymentMethod(
        string $paymentMethod
    ): string {
        $paymentMethod = trim($paymentMethod);

        if (
            $paymentMethod === ''
            || strtolower($paymentMethod) === 'pending'
        ) {
            return 'Belum dipilih';
        }

        return $paymentMethod;
    }

    /**
     * Struktur grafik bulanan.
     */
    private function emptyChartData(): array
    {
        return [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'Mei' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Agu' => 0,
            'Sep' => 0,
            'Okt' => 0,
            'Nov' => 0,
            'Des' => 0,
        ];
    }
}