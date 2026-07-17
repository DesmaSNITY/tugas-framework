<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Donationpost extends BaseController
{
    public function index()
    {
        return view('admin/donationpost.php');
    }

    public function GetList(){}
}
