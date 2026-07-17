<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Fondation extends BaseController
{
    public function index()
    {
        return view('admin/yayasan.php');
    }

    public function getlistfondation(){
        
    }
}
