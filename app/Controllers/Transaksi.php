<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKeranjang;
use App\Models\ModelTransaksi;
use CodeIgniter\HTTP\ResponseInterface;

class Transaksi extends BaseController
{
    function store_stransaksi()
    {
        $session = \Config\Services::session();
        $id = $session->get('id');
        $keranjang = new ModelKeranjang();
        $total_harga = $keranjang->where('id_user', $id)->sum('total_harga');
        $nomor_transaksi = date('YmdHis') . rand(100, 999);
        $insert = [
            'id_user' => $id,
            'total_harga' => $total_harga,
            'status_transaksi' => 'menunggu pembayaran',
            'nomor_transaksi' => $nomor_transaksi,,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $transaksi = new ModelTransaksi();
        $store_transaksi = $transaksi->insert($insert);
        $id_transaksi = $transaksi->insertID();
        $keranjang->where('id_user', $id)->update(['id_transaksi' => $id_transaksi]);
        $response = [
            'status' => 'success',
            'message' => 'Transaksi berhasil',
        ];
    }
}
