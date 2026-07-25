<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'first_name' => 'required|min_length[2]|max_length[100]',
        'email'      => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password'   => 'required|min_length[6]',
    ];

    /**
     * Cari user berdasarkan email, dipakai untuk proses login.
     */
    public function findByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }
}
