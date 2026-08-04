<?php

namespace App\Controllers;

use App\Models\DonationPostModel;
use App\Models\TransactionModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Donate extends BaseController
{
    protected DonationPostModel $postModel;
    protected TransactionModel $transactionModel;

    public function __construct()
    {
        $this->postModel        = new DonationPostModel();
        $this->transactionModel = new TransactionModel();
    }

    /**
     * Halaman listing "Program Donasi Terbaru" (dari tabel donationposts + foundations).
     */
    public function index(): string
    {
        $posts = $this->postModel->getActiveWithFoundation();

        foreach ($posts as &$post) {
            $post['progress']    = $this->postModel->progressPercentage($post);
            $post['days_left']   = $this->postModel->daysLeft($post);
            $post['donor_count'] = $this->transactionModel->donorCountForPost($post['id']);
        }

        return view('donate/index', [
            'title'    => 'Mirae — Program Donasi',
            'programs' => $posts,
        ]);
    }

    /**
     * Halaman form "Donate Sekarang" (langkah 1). Wajib login karena
     * tabel transactions butuh user_id (tidak ada kolom donatur tamu).
     */
    public function checkout(int $postId): string
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu untuk berdonasi.');
        }

        $post = $this->postModel->findWithFoundation($postId);

        if (! $post) {
            throw PageNotFoundException::forPageNotFound();
        }

        $post['progress'] = $this->postModel->progressPercentage($post);

        return view('donate/checkout', [
            'title'   => 'Mirae — Donate Sekarang',
            'program' => $post,
        ]);
    }

    /**
     * Simpan donasi ke tabel transactions (status masih "pending").
     */
    public function store()
    {
        $userId = session()->get('user_id');

        if (! $userId) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu untuk berdonasi.');
        }

        $rules = [
            'donationpost_id' => 'required|numeric',
            'amount'          => 'required|numeric|greater_than[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                              ->withInput()
                              ->with('errors', $this->validator->getErrors());
        }

        $transactionId = $this->transactionModel->insert([
            'user_id'         => $userId,
            'donationpost_id' => $this->request->getPost('donationpost_id'),
            'amount'          => $this->request->getPost('amount'),
            'message'         => $this->request->getPost('message'),
            'status'          => 'pending',
        ]);

        return redirect()->to('/donate/confirm/' . $transactionId);
    }

    /**
     * Halaman konfirmasi & pilih metode pembayaran (langkah 2).
     */
    public function confirm(int $transactionId): string
    {
        $transaction = $this->transactionModel->find($transactionId);

        if (! $transaction || (int) $transaction['user_id'] !== (int) session()->get('user_id')) {
            throw PageNotFoundException::forPageNotFound();
        }

        $post = $this->postModel->findWithFoundation($transaction['donationpost_id']);

        return view('donate/confirm', [
            'title'    => 'Mirae — Konfirmasi Donasi',
            'donation' => $transaction,
            'program'  => $post,
        ]);
    }

    /**
     * Proses pembayaran: update status transaksi & tambah current_amount program.
     */
    public function pay(int $transactionId)
    {
        $transaction = $this->transactionModel->find($transactionId);

        if (! $transaction || (int) $transaction['user_id'] !== (int) session()->get('user_id')) {
            throw PageNotFoundException::forPageNotFound();
        }

        $method = $this->request->getPost('payment_method');

        $this->transactionModel->update($transactionId, [
            'payment_method' => $method,
            'status'         => 'paid',
        ]);

        $post = $this->postModel->find($transaction['donationpost_id']);
        $this->postModel->update($post['id'], [
            'current_amount' => $post['current_amount'] + $transaction['amount'],
        ]);

        return redirect()->to('/donate/success/' . $transactionId);
    }

    public function success(int $transactionId): string
    {
        $transaction = $this->transactionModel->find($transactionId);

        if (! $transaction || (int) $transaction['user_id'] !== (int) session()->get('user_id')) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('donate/success', [
            'title'    => 'Mirae — Donasi Berhasil',
            'donation' => $transaction,
        ]);
    }

    /**
     * Halaman "Donasi Saya" — riwayat donasi milik user yang sedang login.
     */
    public function history(): string
    {
        $userId = session()->get('user_id');

        $history = $this->transactionModel->historyForUser($userId);

        $totalDonated = array_sum(array_map(
            static fn ($item) => $item['status'] === 'paid' ? $item['amount'] : 0,
            $history
        ));

        return view('donate/history', [
            'title'        => 'Mirae — Donasi Saya',
            'history'      => $history,
            'totalDonated' => $totalDonated,
        ]);
    }
}
