<?php

namespace App\Models;

use CodeIgniter\Model;


class DonationModel extends Model
{

    protected $table='donations';

    protected $primaryKey='id';

    protected $returnType='array';


    protected $allowedFields=[

        'program_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'donor_city',
        'amount',
        'admin_fee',
        'message',
        'show_name',
        'payment_method',
        'status'

    ];


    protected $useTimestamps=true;

    protected $createdField='created_at';

    protected $updatedField='updated_at';


}