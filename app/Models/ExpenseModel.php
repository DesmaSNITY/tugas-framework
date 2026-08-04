<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpenseModel extends Model
{
    protected $table            = 'expenses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'donationpost_id',
        'beneficiary', // ⬅️ added — was missing, form data was being silently dropped
        'amount',
        'status'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true; // ⬅️ fixed: was false, table has created_at/updated_at
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // deletedField removed — useSoftDeletes is false, no deleted_at column on this table

    // Validation
    protected $validationRules = [
        'donationpost_id' => 'required|integer',
        'beneficiary'     => 'required|max_length[255]',
        'amount'          => 'required|integer|greater_than[0]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Valid status transitions, mirrored server-side so a direct API call
    // can't skip straight from pending to paid even if the UI allows it
    private array $allowedTransitions = [
        'pending'  => ['approved', 'rejected'],
        'approved' => ['paid', 'rejected'],
        'paid'     => [],
        'rejected' => [],
    ];

    public function canTransition(string $from, string $to): bool
    {
        return in_array($to, $this->allowedTransitions[$from] ?? [], true);
    }

    // Joins donationposts so the frontend gets a title, not just an id
    public function getWithDonationPostTitle()
    {
        return $this->select('expenses.*, donationposts.title as donationpost_title')
                     ->join('donationposts', 'donationposts.id = expenses.donationpost_id', 'left')
                     ->findAll();
    }
}