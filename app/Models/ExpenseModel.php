<?php

namespace App\Models;

use CodeIgniter\Model;


class ExpenseModel extends Model
{

    protected $table='expenses';

    protected $primaryKey='id';

    protected $returnType='array';


    protected $allowedFields=[

        'donationpost_id',
        'amount',
        'beneficary',
        'status'

    ];


    protected $useTimestamps=true;

    protected $createdField='created_at';

    protected $updatedField='updated_at';


}