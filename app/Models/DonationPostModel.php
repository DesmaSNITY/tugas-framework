<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model untuk tabel `donationposts` (program donasi).
 */
class DonationPostModel extends Model
{
    protected $table            = 'donationposts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'picture',
        'foundation_id',
        'title',
        'description',
        'deadline',
        'target_amount',
        'current_amount',
        'status', // draft | active | completed | cancelled
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'foundation_id'  => 'required|numeric',
        'title'          => 'required|min_length[3]|max_length[255]',
        'target_amount'  => 'required|numeric|greater_than[0]',
    ];

    /**
     * Ambil semua program berstatus "active", sekalian nama yayasannya (join foundations).
     */
    public function getActiveWithFoundation(): array
    {
        return $this->select('donationposts.*, foundations.name as foundation_name')
                     ->join('foundations', 'foundations.id = donationposts.foundation_id', 'left')
                     ->where('donationposts.status', 'active')
                     ->orderBy('donationposts.created_at', 'DESC')
                     ->findAll();
    }

    /**
     * Ambil satu program beserta nama yayasannya.
     */
    public function findWithFoundation(int $id): ?array
    {
        return $this->select('donationposts.*, foundations.name as foundation_name')
                     ->join('foundations', 'foundations.id = donationposts.foundation_id', 'left')
                     ->where('donationposts.id', $id)
                     ->first();
    }

    /**
     * Persentase dana terkumpul terhadap target.
     */
    public function progressPercentage(array $post): float
    {
        if ((float) $post['target_amount'] <= 0) {
            return 0;
        }

        return min(100, round(((float) $post['current_amount'] / (float) $post['target_amount']) * 100, 1));
    }

    /**
     * Sisa hari menuju deadline program (0 kalau sudah lewat/tidak ada deadline).
     */
    public function daysLeft(array $post): int
    {
        if (empty($post['deadline'])) {
            return 0;
        }

        $diff = strtotime($post['deadline']) - time();

        return max(0, (int) ceil($diff / 86400));
    }
}
