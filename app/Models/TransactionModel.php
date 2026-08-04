<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model untuk tabel `transactions` (donasi yang dilakukan user yang login).
 */
class TransactionModel extends Model
{
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id',
        'donationpost_id',
        'amount',
        'message',
        'payment_method',
        'status', // pending | paid | failed | expired | cancelled
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'user_id'         => 'required|numeric',
        'donationpost_id' => 'required|numeric',
        'amount'          => 'required|numeric|greater_than[0]',
    ];

    /**
     * Total semua donasi yang statusnya "paid".
     */
    public function totalIncome(): float
    {
        return (float) ($this->selectSum('amount')->where('status', 'paid')->first()['amount'] ?? 0);
    }

    /**
     * Rekap total donasi "paid" per bulan pada tahun tertentu.
     */
    public function monthlyIncome(int $year): array
    {
        return $this->select("MONTH(created_at) as month, SUM(amount) as total")
                     ->where('status', 'paid')
                     ->where('YEAR(created_at)', $year)
                     ->groupBy('MONTH(created_at)')
                     ->findAll();
    }

    /**
     * Jumlah donatur unik (berdasarkan user_id) yang donasinya sudah "paid".
     */
    public function donorCount(): int
    {
        return $this->distinct()
                     ->select('user_id')
                     ->where('status', 'paid')
                     ->countAllResults();
    }

    /**
     * Jumlah donatur unik untuk satu program tertentu.
     */
    public function donorCountForPost(int $donationPostId): int
    {
        return $this->distinct()
                     ->select('user_id')
                     ->where('donationpost_id', $donationPostId)
                     ->where('status', 'paid')
                     ->countAllResults();
    }

    /**
     * Riwayat donasi milik satu user, sekalian judul programnya (join donationposts).
     */
    public function historyForUser(int $userId): array
    {
        return $this->select('transactions.*, donationposts.title as post_title')
                     ->join('donationposts', 'donationposts.id = transactions.donationpost_id', 'left')
                     ->where('transactions.user_id', $userId)
                     ->orderBy('transactions.created_at', 'DESC')
                     ->findAll();
    }

    /**
     * Semua transaksi donasi, sekalian nama donatur & nama yayasan penerima
     * (dipakai untuk tabel gabungan "Donation Transactions and Expenses" di Laporan).
     */
    public function getAllWithDetails(): array
    {
        return $this->select("transactions.*,
                TRIM(CONCAT(users.first_name, ' ', COALESCE(users.last_name, ''))) as donor_name,
                foundations.name as foundation_name")
                     ->join('users', 'users.id = transactions.user_id', 'left')
                     ->join('donationposts', 'donationposts.id = transactions.donationpost_id', 'left')
                     ->join('foundations', 'foundations.id = donationposts.foundation_id', 'left')
                     ->orderBy('transactions.created_at', 'DESC')
                     ->findAll();
    }
}
