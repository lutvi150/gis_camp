<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFoto;
use App\Models\ModelProduk;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function index()
    {
        $data['title'] = 'Data Produk';
        return view('produk/index', $data);
    }
    function add()
    {
        $session = \Config\Services::session();
        $data['title'] = 'Tambah Produk';
        if ($session->get('role') == 'administrator') {
            $user = new ModelUser();
            $data['nama_tempat'] = $user->where('role', 'owner')->findAll();
        }
        return view('produk/add', $data);
    }
    function add_process()
    {
        $session = \Config\Services::session();
        $validation = \Config\Services::validation();
        $validate = [
            'nama_produk' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,4096]'
        ];
        $rule = [
            'nama_produk' => [
                'required' => 'Nama Produk tidak boleh kosong',
            ],
            'jenis' => [
                'required' => 'Jenis Produk tidak boleh kosong',
            ],
            'harga' => [
                'required' => 'Harga Produk tidak boleh kosong',
            ],
            'deskripsi' => [
                'required' => 'Deskripsi Produk tidak boleh kosong'
            ],
            'foto' => [
                'uploaded' => 'Foto tidak boleh kosong',
                'mime_in' => 'Foto harus berformat jpg, jpeg, atau png',
                'max_size' => 'Ukuran foto maksimal 4MB'
            ]

        ];
        if ($session->get('role') == 'administrator') {
            $validate['tempat_camping'] = 'required';
            $rule['tempat_camping'] = [
                'required' => 'Tempat Camping tidak boleh kosong',
            ];
        }

        $validation->setRules($validate, $rule);
        if (!$validation->withRequest($this->request)->run()) {
            $response = [
                'status' => 'validation_failed',
                'message' => $validation->getErrors(),
            ];
        } else {
            // try {
            $foto = $this->request->getFile('foto');
            $nama_file = date('ymdhis') . '_' . $foto->getRandomName();
            $foto->move('uploads/produk', $nama_file);
            $insert_foto = [
                'jenis' => 'foto_produk',
                'foto' => (string)$nama_file,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $foto_produk = new ModelFoto();
            $store_foto = $foto_produk->insert($insert_foto);
            $id_foto = $foto_produk->insertID();
            if ($session->get('role') == 'administrator') {
                $id_user = $this->request->getPost('tempat_camping');
            } else {
                $id_user = $session->get('id');
            }
            $data = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'jenis' => $this->request->getPost('jenis'),
                'harga' => (int)$this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'foto' => $nama_file,
                'id_foto' => $id_foto,
                'id_user' => $id_user,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $produk = new ModelProduk();
            $store_produk = $produk->insert($data);
            $response = [
                'status' => 'success',
                'message' => 'data berhasil di simpan'
            ];
            // } catch (\Throwable $th) {
            //     $response = [
            //         'status' => 'error',
            //         'message' => 'data gagal di simpan' . $th
            //     ];
            // }
        }
        return $this->response->setJSON($response, ResponseInterface::HTTP_OK);
    }
}
