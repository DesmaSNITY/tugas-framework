<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'amount',
        'payment_method',
        'status'
    ];

    protected $useTimestamps = true;
}