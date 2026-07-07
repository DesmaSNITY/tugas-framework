<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected $allowedFields    = [
        //shield model
        'username',
        'status',
        'status_message',
        'active',
        'last_active',
        //custom model
        'first_name',
        'last_name',
        'phone',
        'avatar'
    ];
}
