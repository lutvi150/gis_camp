<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        return view('admin/index', $data);
    }
}
