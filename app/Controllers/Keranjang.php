<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use CodeIgniter\HTTP\ResponseInterface;

class Keranjang extends BaseController
{
    function keranjang_process()
    {
        $session = \Config\Services::session();
        $produk = new ModelProduk();
        $get_produk = $produk->find($this->request->getPost('id_produk'));
        $id_produk = $this->request->getPost('id_produk');
        $id_user = $session->get('id');
        $insert = [
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'id_transaksi' => '-',
            'jumlah' => 1,
            'harga' => $get_produk->harga,
            'total_harga' => $get_produk->harga,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $this->response->setJSON($insert, ResponseInterface::HTTP_OK,);
    }
    function check_keranjanga_user() : Returntype {
        
    }
}
