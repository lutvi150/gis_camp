<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKeranjang;
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
        $keranjang = new ModelKeranjang();
        $check_keranjang = $keranjang->where(['id_user' => $id_user, 'id_produk' => $id_produk])->first();
        if ($check_keranjang) {
            $jumlah = $check_keranjang->jumlah + 1;
            $total_harga = $jumlah * $get_produk->harga;
            $update = [
                'jumlah' => $jumlah,
                'total_harga' => $total_harga,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $keranjang->update($check_keranjang->id_keranjang, $update);
        } else {
            $keranjang->insert($insert);
        }
        $response = [
            'status' => 'success',
            'data' => [
                'count' => $keranjang->where(['id_user' => $id_user])->countAllResults(),
            ]
        ];
        return $this->response->setJSON($response, ResponseInterface::HTTP_OK,);
    }
    function check_keranjang_user()
    {
        $session = \Config\Services::session();
        $id_user = $session->get('id');
        $keranjang = new ModelKeranjang();
        $keranjang_user = $keranjang->where(['id_user' => $id_user])->countAllResults();
        $response = [
            'status' => 'success',
            'data' => [
                'count' => $keranjang_user,
            ],
        ];
        return $this->response->setJSON($response, ResponseInterface::HTTP_OK,);
    }
    function get_keranjang_user()
    {
        $data['title'] = 'Keranjang';
        $session = \Config\Services::session();
        $keranjang = new ModelKeranjang();
        $id = $session->get('id');
        $get_data = $keranjang->join('table_produk', 'table_produk.id_produk = table_keranjang.id_produk')->where(['table_keranjang.id_user' => $id])->get()->getResult();
        $data['keranjang'] = $get_data;
        return view('cart/cart_user', $data);
        // echo json_encode($get_data);
    }
}
