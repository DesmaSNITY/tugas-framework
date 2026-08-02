<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model untuk tabel `expenses` (pengeluaran dana dari program donasi).
 */
class ExpenseModel extends Model
{
    protected $table            = 'expenses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'donationpost_id',
        'amount',
        'beneficiary',
        'status', // pending | approved | paid | rejected
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'donationpost_id' => 'required|numeric',
        'amount'          => 'required|numeric|greater_than[0]',
    ];

    /**
     * Total pengeluaran yang berstatus "paid".
     */
    public function totalExpense(): float
    {
        return (float) ($this->selectSum('amount')->where('status', 'paid')->first()['amount'] ?? 0);
    }

    /**
     * Rekap total pengeluaran "paid" per bulan pada tahun tertentu.
     */
    public function monthlyExpense(int $year): array
    {
        return $this->select("MONTH(created_at) as month, SUM(amount) as total")
                     ->where('status', 'paid')
                     ->where('YEAR(created_at)', $year)
                     ->groupBy('MONTH(created_at)')
                     ->findAll();
    }

    /**
     * Semua pengeluaran, sekalian nama yayasan yang mengeluarkan dananya
     * (dipakai untuk tabel gabungan "Donation Transactions and Expenses" di Laporan).
     */
    public function getAllWithDetails(): array
    {
        return $this->select('expenses.*, foundations.name as foundation_name')
                     ->join('donationposts', 'donationposts.id = expenses.donationpost_id', 'left')
                     ->join('foundations', 'foundations.id = donationposts.foundation_id', 'left')
                     ->orderBy('expenses.created_at', 'DESC')
                     ->findAll();
    }
}
