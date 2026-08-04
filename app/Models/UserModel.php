<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = array_merge(
            $this->allowedFields,
            [
                'first_name',
                'last_name',
                'phone',
                'avatar'
            ]
        );
    }
}