<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    use ResponseTrait;
    public function index()
    {

        $data['title'] = 'Dashboard User';
        // return $this->respond($data_diri, ResponseInterface::HTTP_OK);
        return view('user/index', $data);
    }
}
