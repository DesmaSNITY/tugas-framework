<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;
use DateTimeImmutable;

class TransactionModel extends Model
{
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'user_id',
        'amount',
        'message',
        'payment_method',
        'status',
        'donor_city',
        'show_name',
        'donationpost_id',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'user_id'         => 'required|integer',
        'donationpost_id' => 'required|integer',
        'amount'          => 'required|integer|greater_than[0]',
        'message'         => 'permit_empty|max_length[200]',
        'payment_method'  => 'required|max_length[100]',
        'status'          => 'required|in_list[pending,success,failed]',
        'donor_city'      => 'permit_empty|max_length[100]',
        'show_name'       => 'permit_empty|in_list[0,1]',
    ];

    public function findOwned(int $transactionId, int $userId): ?array
    {
        $transaction = $this
            ->where('id', $transactionId)
            ->where('user_id', $userId)
            ->first();

        return $transaction ?: null;
    }

    public function markAsFailed(int $transactionId, int $userId): bool
    {
        return $this->db->table('transactions')
            ->where('id', $transactionId)
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->update([
                'status'     => 'failed',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }

    public function expirePendingByUser(int $userId, int $minutes = 15): bool
    {
        $expiredBefore = (new DateTimeImmutable())
            ->modify('-' . max(1, $minutes) . ' minutes')
            ->format('Y-m-d H:i:s');

        return $this->db->table('transactions')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->where('created_at <', $expiredBefore)
            ->update([
                'status'     => 'failed',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }

    public function getHistoryByUser(int $userId): array
    {
        return $this->db->table('transactions t')
            ->select([
                't.id',
                't.user_id',
                't.amount',
                't.message',
                't.payment_method',
                't.status',
                't.created_at',
                't.updated_at',
                't.donor_city',
                't.show_name',
                't.donationpost_id',
                'dp.title AS program_title',
                'dp.picture',
                'dp.category',
                'dp.deadline',
                'f.name AS foundation_name',
                'f.location AS foundation_location',
            ])
            ->join('donationposts dp', 'dp.id = t.donationpost_id', 'left')
            ->join('foundations f', 'f.id = dp.foundation_id', 'left')
            ->where('t.user_id', $userId)
            ->orderBy('t.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}