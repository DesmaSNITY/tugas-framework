<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model untuk tabel `foundations` (yayasan/penyelenggara program donasi).
 */
class FoundationModel extends Model
{
    protected $table            = 'foundations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name',
        'location',
        'status', // active | inactive
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[150]',
    ];

    public function getActive(): array
    {
        return $this->where('status', 'active')->findAll();
    }
}
