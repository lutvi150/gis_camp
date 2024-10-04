<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    function home()
    {
        $data['owl'] = [
            'upload/owl/5.jpg',
            'upload/owl/4.jpg'
        ];
        $data['testimoni'] = (object)[
            (object)[
                'nama' => 'Budi',
                'alamat' => 'Bireuen',
                'foto' => 'upload/profil.jpg',
                'testimoni' => 'Saya sangat puas dengan pelayanan yang diberikan . Fasilitasnya sangat lengkap dan harga yang terjangkau.'
            ],
            (object)
            [
                'nama' => 'Ani',
                'alamat' => 'Banda Aceh',
                'foto' => 'upload/profil.jpg',
                'testimoni' => 'Wisata camping di danau lut tawar sangat menyenangkan. Kita bisa menikmati pemandangan alam yang indah.'
            ],
            (object)
            [
                'nama' => 'Lili',
                'alamat' => 'Banda Aceh',
                'foto' => 'upload/profil.jpg',
                'testimoni' => 'Udaranya sangat indah. Tidak terlalu ramai, harga yang terjangkau, fasilitas yang lengkap.'
            ]
        ];
        $data['camping'] = (object)[
            (object)[
                'nama_camping' => 'Camping Manja',
                'jarak' => '10 Km',
                'harga' => 'Rp 100.000,-',
                'foto' => 'upload/owl/1.jpg',
                'lokasi' => 'JWJR+7Q2, Kelitu, Kec. Bintang, Kabupaten Aceh Tengah, Aceh'
            ],
            (object)[
                'nama_camping' => 'Kelaping Camping',
                'jarak' => '20 Km',
                'harga' => 'Rp 150.000,-',
                'foto' => 'upload/owl/2.jpg',
                'lokasi' => 'JWJR+7Q2, Kelitu, Kec. Bintang, Kabupaten Aceh Tengah, Aceh'
            ],
            (object)[
                'nama_camping' => 'Camping Ground Takengon',
                'jarak' => '30 Km',
                'harga' => 'Rp 200.000,-',
                'foto' => 'upload/owl/3.jpg',
                'lokasi' => 'JWJR+7Q2, Kelitu, Kec. Bintang, Kabupaten Aceh Tengah, Aceh'
            ]
        ];
        return view('home', $data);
    }
}
