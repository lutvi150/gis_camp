<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        return view('admin/index', $data);
    }
    function users()
    {
        $user = new ModelUser();
        $data['title'] = 'Data Pengguna';
        $data['pengguna'] = $user->whereNotIn('role', ['administrator'])->orderBy('id_user', 'DESC')->findAll();
        // return $this->respond($data, 200);
        // exit;
        return view('admin/users', $data);
    }
    function user_reset_password()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules(
            [
                'password' => 'required|min_length[6]',
            ],
            [
                'password' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 6 karakter'
                ]
            ]
        );
        if (!$validation->withRequest($this->request)->run()) {
            $response = [
                'status' => 'validation_failed',
                'message' => $validation->getErrors(),
            ];
        } else {
            $user = new ModelUser();
            $id = $this->request->getVar('id_user');
            $password = hash('sha256', $this->request->getVar('password'));
            $user->update($id, ['password' => $password]);
            $response = [
                'status' => 'success',
                'message' => 'Password berhasil diubah',
            ];
        }
        return $this->respond($response, 200);
    }
}
