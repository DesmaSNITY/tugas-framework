<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields, // spreads Shield's existing fields in
            'first_name',
            'last_name',
            'phone',
            'avatar',
        ];
    }
}
