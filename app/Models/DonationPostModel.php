<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class DonationPostModel extends Model
{
    protected $table            = 'donationposts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'picture',
        'foundation_id',
        'title',
        'description',
        'deadline',
        'target_amount',
        'current_amount',
        'status',
        'category',
        'user_id',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getForDonatePage(?string $category = null): array
    {
        $builder = $this->baseDonateQuery()
            ->where("LOWER(COALESCE(dp.status, '')) <> 'finished'", null, false)
            ->where('COALESCE(dp.current_amount, 0) < dp.target_amount', null, false);

        if ($category !== null && trim($category) !== '') {
            $builder->where(
                'LOWER(dp.category) = LOWER(' . $this->db->escape(trim($category)) . ')',
                null,
                false
            );
        }

        return $builder
            ->orderBy('dp.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getWithFoundationById(int $id): ?array
    {
        if ($id <= 0) {
            return null;
        }

        $program = $this->baseDonateQuery()
            ->where('dp.id', $id)
            ->get()
            ->getRowArray();

        return $program ?: null;
    }

    private function baseDonateQuery(): BaseBuilder
    {
        $builder = $this->db->table('donationposts dp');

        $builder->select([
            'dp.id',
            'dp.picture',
            'dp.foundation_id',
            'dp.title',
            'dp.description',
            'dp.deadline',
            'dp.target_amount',
            'dp.current_amount',
            'dp.status',
            'dp.created_at',
            'dp.updated_at',
            'dp.category',
            'dp.user_id',
            'f.name AS foundation_name',
            'f.location AS foundation_location',
            'f.status AS foundation_status',
        ]);

        $builder->select(
            '(
                SELECT COUNT(t.id)
                FROM transactions t
                WHERE t.donationpost_id = dp.id
                AND LOWER(COALESCE(t.status, \'\')) = \'success\'
            ) AS donor_count',
            false
        );

        $builder->join('foundations f', 'f.id = dp.foundation_id', 'left');

        return $builder;
    }
}