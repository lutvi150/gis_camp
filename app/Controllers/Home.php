<?php

namespace App\Controllers;

use App\Models\ModelDataDiri;
use App\Models\ModelDesa;
use App\Models\ModelKabupaten;
use App\Models\ModelKecamatan;
use App\Models\ModelProvinsi;
use App\Models\ModelUser;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session as SessionSession;
use Config\Session;

class Home extends BaseController
{
    use ResponseTrait;
    public function index(): string
    {
        return view('welcome_message');
    }
    function login()
    {
        $data['title'] = 'Login';
        $session = \Config\Services::session();
        if ($session->get('login')) {
            if ($session->get('role') == 'administrator') {
                return redirect()->to('/admin');
            } elseif ($session->get('role') == 'user') {
                return redirect()->to('/user');
            } elseif ($session->get('role') == 'owner') {
                return redirect()->to('/owner');
            }
        }
        return view('login', $data);
    }
    function login_process()
    {

        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
        ], [
            'email' => [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Email tidak valid',
            ],
            'password' => [
                'required' => 'password tidak boleh kosong',
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $response = [
                'status' => 'validation_failed',
                'message' => $validation->getErrors(),
            ];
        } else {
            $email = $this->request->getPost('email');
            $password = hash('sha256', $this->request->getPost('password'));
            $user = new ModelUser();
            $get_email = $user->where('email', $email)->first();
            if ($get_email == null) {
                $response = [
                    'status' => 'email_not_found',
                    'message' => 'email tidak ditemukan',
                ];
            } else {
                $get_email = $user->where('email', $get_email->email)->where('password', $password)->first();
                if ($get_email) {
                    $session = \Config\Services::session();
                    $new_session = [
                        'login' => true,
                        'email' => $get_email->email,
                        'id' => $get_email->id_user,
                        'nama_user' => $get_email->nama_user,
                        'role' => $get_email->role,
                        'profil_status' => $get_email->profil_status,
                    ];
                    $session->set($new_session);
                    $response = [
                        'status' => 'success',
                        'message' => 'login berhasil',
                    ];
                } else {
                    $response = [
                        'status' => 'password_not_same',
                        'message' => 'password tidak sama',
                    ];
                }
            }
        }
        return $this->respond($response, 200);
    }
    function register()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }
    function register_process()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
            'try_password' => 'required|matches[password]'
        ], [
            'email' => [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Email tidak valid',
            ],
            'password' => [
                'required' => 'password tidak boleh kosong',
            ],
            'try_password' => [
                'required' => 'password tidak boleh kosong',
                'matches' => 'password tidak sama',
            ]
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $response = [
                'status' => 'validation_failed',
                'message' => $validation->getErrors(),
            ];
        } else {
            $email = $this->request->getPost('email');
            $password = hash('sha256', $this->request->getPost('password'));
            $u_password = hash('sha256', $this->request->getPost('try_password'));
            if ($password != $u_password) {
                $response = [
                    'status' => 'password_not_same',
                    'message' => 'password tidak sama',
                ];
            } else {
                $user = new ModelUser();
                $get_email = $user->where('email', $email)->first();
                if ($get_email == null) {
                    $store = [
                        'nama_user' => '-',
                        'email' => $email,
                        'profil_status' => 'nonaktif',
                        'password' => $password,
                        'role' => 'user',
                        'last_login' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $insert = $user->insert($store);
                    $response = [
                        'status' => 'success',
                        'message' => 'pendaftaran berhasil',
                    ];
                } else {
                    $response = [
                        'status' => 'already_exist',
                        'message' => 'email sudah terdaftar',
                    ];
                }
            }
        }
        return $this->respond($response, 200);
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
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
    // use for update profil
    function update_profil()
    {
        $data['title'] = 'Update Diri Diri';
        return view('update_profil', $data);
    }
    function update_profil_process()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_user' => 'required',
            'nomor_hp' => 'required|numeric',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'tanda_pengenal' => 'uploaded[tanda_pengenal]|mime_in[tanda_pengenal,image/jpg,image/jpeg,image/png]|max_size[tanda_pengenal,4096]',
        ], [
            'nama_user' => [
                'required' => 'Nama tidak boleh kosong',
            ],
            'nomor_hp' => [
                'required' => 'No HP tidak boleh kosong',
                'numeirc' => 'No HP harus berupa angka',
            ],
            'provinsi' => [
                'required' => 'Provinsi tidak boleh kosong'
            ],
            'kabupaten' => [
                'required' => 'Kabupaten tidak boleh kosong'
            ],
            'kecamatan' => [
                'required' => 'Kecamatan tidak boleh kosong'
            ],
            'desa' => [
                'required' => 'Desa tidak boleh kosong'
            ],
            'alamat' => [
                'required' => 'Alamat tidak boleh kosong',
            ],
            'tanda_pengenal' => [
                'uploaded' => 'Tanda Pengenal tidak boleh kosong',
                'mime_in' => 'Tanda Pengenal harus berformat jpg, jpeg, atau png',
                'max_size' => 'Ukuran file maksimal 4MB',
            ]
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $response = [
                'status' => 'validation_failed',
                'message' => $validation->getErrors(),
            ];
        } else {
            $session = \Config\Services::session();
            $id_user = $session->get('id');
            $nama_user = $this->request->getPost('nama_user');
            $email = $this->request->getPost('email');
            $nomor_hp = $this->request->getPost('nomor_hp');
            $provinsi = $this->request->getPost('provinsi');
            $kabupaten = $this->request->getPost('kabupaten');
            $kecamatan = $this->request->getPost('kecamatan');
            $desa = $this->request->getPost('desa');
            $alamat = $this->request->getPost('alamat');
            $tanda_pengenal = $this->request->getFile('tanda_pengenal');
            if ($tanda_pengenal->getName() != '') {
                $tanda_pengenal_name = $id_user . "_" . date('YmdHis') . "_" . $tanda_pengenal->getRandomName();
                $tanda_pengenal->move('upload/tanda_pengenal', $tanda_pengenal_name);
                $data = [
                    'id_user' => $id_user,
                    'nomor_hp' => $nomor_hp,
                    'provinsi' => $provinsi,
                    'kabupaten' => $kabupaten,
                    'kecamatan' => $kecamatan,
                    'desa' => $desa,
                    'alamat' => $alamat,
                    'tanda_pengenal' => $tanda_pengenal_name,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $data_diri = new ModelDataDiri();
                $check_data_diri = $data_diri->where('id_user', $id_user)->first();
                if ($check_data_diri) {
                    if (file_exists('upload/tanda_pengenal/' . $check_data_diri->tanda_pengenal)) {
                        unlink('upload/tanda_pengenal/' . $check_data_diri->tanda_pengenal);
                    }
                    $update = $data_diri->update($check_data_diri->id_data_diri, $data);
                } else {
                    $data_diri->insert($data);
                }

                $session->set(['nama_user' => $nama_user, 'profil_status' => 'aktif']);
                $user = new ModelUser();
                $update = $user->update($id_user, ['nama_user' => $nama_user, 'profil_status' => 'aktif']);
                $response = [
                    'status' => 'success',
                    'message' => 'profil berhasil diupdate',
                ];
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'foto tidak boleh kosong',
                ];
            }
        }
        return $this->respond($response, ResponseInterface::HTTP_OK);
    }
    // get data prinvisi
    function location()
    {
        $jenis = $this->request->getPost('jenis');
        $id_filter = $this->request->getPost('id_filter');
        if ($jenis == 'prov') {
            $prov = new ModelProvinsi();
            $prov = $prov->findAll();
            $response = [
                'status' => 'success',
                'message' => 'data berhasil diambil',
                'data' => $prov,
            ];
        } elseif ($jenis == 'kab') {
            $kab = new ModelKabupaten();
            $kab = $kab->where('id_provinsi', $id_filter)->findAll();
            $response = [
                'status' => 'success',
                'message' => 'data berhasil diambil',
                'data' => $kab,
            ];
        } elseif ($jenis == 'kec') {
            $kec = new ModelKecamatan();
            $kec = $kec->where('id_kabupaten', $id_filter)->findAll();
            $response = [
                'status' => 'success',
                'message' => 'data berhasil diambil',
                'data' => $kec,
            ];
        } elseif ($jenis == 'des') {
            $des = new ModelDesa();
            $des = $des->where('id_kecamatan', $id_filter)->findAll();
            $response = [
                'status' => 'success',
                'message' => 'data berhasil diambil',
                'data' => $des,
            ];
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'jenis tidak ditemukan'
            ];
        }
        return $this->respond($response, ResponseInterface::HTTP_OK);
    }
}
