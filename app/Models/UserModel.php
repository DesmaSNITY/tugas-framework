<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';
    protected $protectFields    = true;

    protected $allowedFields = [
        'username',
        'email',
        'password_hash',
        'first_name',
        'last_name',
        'phone',
        'avatar',
        'role',
        'status',
        'status_message',
        'active',
        'last_active',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'username' => [
            'label' => 'Username',
            'rules' => 'permit_empty|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z0-9._-]+$/]',
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'permit_empty|valid_email|max_length[100]',
        ],
        'password_hash' => [
            'label' => 'Password',
            'rules' => 'permit_empty|max_length[255]',
        ],
        'first_name' => [
            'label' => 'Nama depan',
            'rules' => 'permit_empty|max_length[100]',
        ],
        'last_name' => [
            'label' => 'Nama belakang',
            'rules' => 'permit_empty|max_length[100]',
        ],
        'phone' => [
            'label' => 'Nomor telepon',
            'rules' => 'permit_empty|max_length[20]',
        ],
        'avatar' => [
            'label' => 'Avatar',
            'rules' => 'permit_empty|max_length[255]',
        ],
        'role' => [
            'label' => 'Role',
            'rules' => 'permit_empty|max_length[100]',
        ],
        'status' => [
            'label' => 'Status',
            'rules' => 'permit_empty|max_length[255]',
        ],
        'active' => [
            'label' => 'Status aktif',
            'rules' => 'permit_empty|in_list[0,1]',
        ],
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function findForLogin(string $identity): ?array
    {
        $identity = strtolower(trim($identity));

        if ($identity === '') {
            return null;
        }

        $user = $this->db->query(
            'SELECT *
'
            . 'FROM users
'
            . 'WHERE deleted_at IS NULL
'
            . 'AND (LOWER(email) = ? OR LOWER(username) = ?)
'
            . 'LIMIT 1',
            [$identity, $identity]
        )->getRowArray();

        return is_array($user) ? $user : null;
    }

    public function emailExists(string $email, ?int $ignoreId = null): bool
    {
        $email = strtolower(trim($email));

        if ($email === '') {
            return false;
        }

        $sql    = 'SELECT id FROM users WHERE deleted_at IS NULL AND LOWER(email) = ?';
        $params = [$email];

        if ($ignoreId !== null) {
            $sql     .= ' AND id <> ?';
            $params[] = $ignoreId;
        }

        $sql .= ' LIMIT 1';

        return $this->db->query($sql, $params)->getRowArray() !== null;
    }

    public function usernameExists(string $username, ?int $ignoreId = null): bool
    {
        $username = strtolower(trim($username));

        if ($username === '') {
            return false;
        }

        $sql    = 'SELECT id FROM users WHERE deleted_at IS NULL AND LOWER(username) = ?';
        $params = [$username];

        if ($ignoreId !== null) {
            $sql     .= ' AND id <> ?';
            $params[] = $ignoreId;
        }

        $sql .= ' LIMIT 1';

        return $this->db->query($sql, $params)->getRowArray() !== null;
    }

    public function updateLastActive(int $userId): bool
    {
        return $this->update($userId, [
            'last_active' => date('Y-m-d H:i:s'),
        ]);
    }
}
