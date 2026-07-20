<?php

namespace App\Models;

use CodeIgniter\Model;

class DonationPostModel extends Model
{
    protected $table            = 'donationposts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'foundation_id',
        'title',
        'description',
        'deadline',
        'target_amount',
        'current_amount',
        'status',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // no deletedField since useSoftDeletes is false and your table has no deleted_at column

    // Validation
    protected $validationRules = [
        'foundation_id' => 'required|integer',
        'title'         => 'required|max_length[255]',
        'description'   => 'required',
        'deadline'      => 'required|valid_date',
        'target_amount' => 'required|integer|greater_than[0]',
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

    // Joins foundations so the frontend gets a name, not just an id
    public function getWithFoundation()
    {
        return $this->select('donationposts.*, foundations.name as foundation_name')
                     ->join('foundations', 'foundations.id = donationposts.foundation_id', 'left')
                     ->findAll();
    }
}