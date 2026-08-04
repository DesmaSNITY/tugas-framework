<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected $returnType = 'array'; // needed for $user['password'] access to work

    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = array_merge(
            $this->allowedFields,
            [
                'first_name',
                'last_name',
                'phone',
                'avatar',
                'email',    // ⬅️ added
                'password', // ⬅️ added
            ]
        );
    }

    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }
}