<?php

namespace App\Models;

use CodeIgniter\Model;

class DonationModel extends Model
{
    protected $table            = 'donations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'program_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'donor_city',
        'amount',
        'admin_fee',
        'message',
        'show_name',
        'payment_method',
        'status', // pending | paid | failed
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'donor_name'  => 'required|min_length[3]',
        'donor_email' => 'required|valid_email',
        'donor_phone' => 'required|min_length[8]',
        'amount'      => 'required|numeric|greater_than[0]',
    ];

    /**
     * Total pemasukan dari donasi yang berstatus "paid".
     */
    public function totalIncome(): float
    {
        return (float) $this->selectSum('amount')
                              ->where('status', 'paid')
                              ->first()['amount'] ?? 0;
    }

    /**
     * Rekap pemasukan per bulan (untuk grafik di Laporan Donasi).
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
     * Jumlah donatur unik (berdasarkan email) yang sudah membayar.
     */
    public function donorCount(): int
    {
        return $this->distinct()
                     ->select('donor_email')
                     ->where('status', 'paid')
                     ->countAllResults();
    }
}
