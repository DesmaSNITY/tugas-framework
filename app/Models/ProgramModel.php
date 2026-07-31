<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table            = 'programs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'title',
        'category',
        'description',
        'organizer',
        'target_amount',
        'collected_amount',
        'donor_count',
        'days_left',
        'is_active',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Ambil semua program yang masih aktif, untuk halaman listing donasi.
     */
    public function getActivePrograms(): array
    {
        return $this->where('is_active', 1)
                     ->orderBy('created_at', 'DESC')
                     ->findAll();
    }

    /**
     * Hitung persentase progres dana terkumpul terhadap target.
     */
    public function progressPercentage(array $program): float
    {
        if ((float) $program['target_amount'] <= 0) {
            return 0;
        }

        $percentage = ((float) $program['collected_amount'] / (float) $program['target_amount']) * 100;

        return min(100, round($percentage, 1));
    }
}
