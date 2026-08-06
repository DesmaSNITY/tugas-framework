<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class FoundationModel extends Model
{
    protected $table            = 'foundations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'name',
        'location',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name' => [
            'label' => 'Nama yayasan',
            'rules' => 'required|max_length[150]',
        ],

        'location' => [
            'label' => 'Lokasi',
            'rules' => 'required|max_length[255]',
        ],

        'status' => [
            'label' => 'Status',
            'rules' => 'permit_empty|max_length[20]',
        ],
    ];

    public function getActive(): array
    {
        return $this
            ->where('status', 'active')
            ->orderBy('name', 'ASC')
            ->findAll();
    }
}