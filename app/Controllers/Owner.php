<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Owner extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $data['title'] = 'Dashboard Pemilik';
        return view('owner/index', $data);
    }
    function produk()
    {
        $data['title'] = 'Fasilitas Camping';
        return view('owner/produk', $data);
    }
    function transaksi()
    {
        $data['title'] = 'Transaksi';
        return view('owner/transaksi', $data);
    }
    function detail()
    {
        $data['title'] = 'Detail Lokasi';
        return view('owner/detail', $data);
    }
}
