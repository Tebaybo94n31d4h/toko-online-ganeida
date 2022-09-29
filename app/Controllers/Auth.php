<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use App\Models\ModelAdmin;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->logged_in) {
				session()->setFlashdata('masuk', 'berhasil masuk !');
				return redirect()->to(base_url('/dashboard'));
		}
        $data = [
            'validation' => \config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function proses_login()
    {
        // cek validasi login
        if (! $this->validate([
                'email' => [
                    'label'  => 'Alamat email',
                    'rules'  => 'required|trim|valid_email',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                        'valid_email' => '{field} tidak valid',
                    ],
                ],
                'password' => [
                    'label'  => 'Kata sandi',
                    'rules'  => 'required|trim|',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                    ],
                ],
            ])) {
                // jika validasi gagal
                $validation =  \Config\Services::validation();
                return redirect()->to('auth')->withInput()->with('validation', $validation);
        } else {
            // jika validasi sukses
            $users = new ModelAuth();
            $admin = new ModelAdmin();
            $security = \Config\Services::security();
            // penyiapan data yang diambil dari form input
            $email = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('email'), true));
            $password = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('password'), true));
            $dataUser = $admin->where(['email' => $email,])->first();
            $dataPelanggan = $users->where(['email_pelanggan' => $email,])->first();
            // dd($dataPelanggan);
            // pengecekan data login
            // jika form diisi
            if ($dataUser) {
                // cek email yang diinput = didatabase
                if ($email == $dataUser->email) {
                    // cek password yang diinput = database
                    if (password_verify($password, $dataUser->password)) {
                        
                        if ($dataUser->aktif == 1) {
                            
                            session()->set([
                                'email' => $dataUser->email,
                                'nama_lengkap' => $dataUser->nama_lengkap,
                                'role_id' => $dataUser->role_id,
                                'logged_in' => TRUE
                            ]);
                            // jika login berhasil
                            if ($dataUser->role_id == 1) {
                                session()->setFlashdata('pesan', 'Berhasil login');
                                return redirect()->to(base_url('/dashboard'));
                            } elseif($dataUser->role_id == 2) {
                                // echo 'berhasil login admin biasa';
                                session()->setFlashdata('pesan', 'Berhasil login');
                                return redirect()->to(base_url('/dashboard'));
                            } else{
                                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                            }

                        } else {
                            // jika password tidak = database
                            session()->setFlashdata('error', 'Email belum diaktivasi');
                            return redirect()->back();
                        }

                    } else {
                        // jika password tidak = database
                        session()->setFlashdata('error', 'Kata sandi salah');
                        return redirect()->back();
                    }

                } else {
                    // jika email yang diinput tidak = database
                    session()->setFlashdata('error', 'Email tidak terdaftar');
                    return redirect()->back();
                }
                
            } elseif ($dataPelanggan) {
                // cek email yang diinput = didatabase
                if ($email == $dataPelanggan->email_pelanggan) {
                    // cek password yang diinput = database
                    if (password_verify($password, $dataPelanggan->password_pelanggan)) {
                        
                        if ($dataPelanggan->aktif_pelanggan == 1) {
                            
                            session()->set([
                                'id_pelanggan' => $dataPelanggan->id_pelanggan,
                                'email_pelanggan' => $dataPelanggan->email_pelanggan,
                                'alamat_pelanggan' => $dataPelanggan->alamat_pelanggan,
                                'nama_pelanggan' => $dataPelanggan->nama_pelanggan,
                                'telepon_pelanggan' => $dataPelanggan->telepon_pelanggan,
                                'image_pelanggan' => $dataPelanggan->image_pelanggan,
                                'role_id' => $dataPelanggan->role_id,
                                'logged_in' => TRUE
                            ]);
                            // jika login berhasil
                            if ($dataPelanggan->role_id == 3) {
                                if (session()->keranjang) {
                                    session()->setFlashdata('pesan', 'Berhasil login');
                                    return redirect()->to(base_url('/checkout'));
                                } else {
                                    session()->setFlashdata('pesan', 'Berhasil login');
                                return redirect()->to(base_url('/riwayat'));
                                }
                            } else {
                                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                            }

                        } else {
                            // jika password tidak = database
                            session()->setFlashdata('error', 'Email belum diaktivasi');
                            return redirect()->back();
                        }

                    } else {
                        // jika password tidak = database
                        session()->setFlashdata('error', 'Kata sandi salah');
                        return redirect()->back();
                    }

                } else {
                    // jika email yang diinput tidak = database
                    session()->setFlashdata('error', 'Email tidak terdaftar');
                    return redirect()->back();
                }
            }else {
                // jika form belum diisi
                session()->setFlashdata('error', 'Email dan kata sandi salah');
                return redirect()->back();
            }

        }
    }

    public function register()
    {
        $data = [
            'validation' => \config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function proses_register()
    {
        // cek validasi
        if (! $this->validate([
                'nama_pelanggan' => [
                    'label'  => 'Nama lengkap',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                    ],
                ],
                'telepon_pelanggan' => [
                    'label'  => 'Telepon / Hp',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                    ],
                ],
                'email_pelanggan' => [
                    'label'  => 'Email',
                    'rules'  => 'required|trim|is_unique[admin.email]|valid_email',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                        'is_unique' => '{field} sudah pernah digunakan',
                        'valid_email' => '{field} tidak valid',
                    ],
                ],
                'alamat_pelanggan' => [
                    'label'  => 'Alamat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                    ],
                ],
                'password_pelanggan' => [
                    'label'  => 'Kata sandi',
                    'rules'  => 'required|trim|min_length[8]',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                        'min_length' => '{field} anda terlalu pendek',
                    ],
                ],
                'password2_pelanggan' => [
                    'label'  => 'Konfirmasi kata sandi',
                    'rules'  => 'required|trim|matches[password_pelanggan]',
                    'errors' => [
                        'required' => 'Semua akun harus menyediakan {field}',
                        'matches' => '{field} anda tidak sama',
                    ],
                ]
            ])) {
                // jika validasi gagal
                $validation =  \Config\Services::validation();
                // dd($validation);
                return redirect()->to('auth/register')->withInput()->with('validation', $validation);
        } else {
            // jika validasi berhasil
            $admin = new ModelAuth();
            $security = \Config\Services::security();
            // lakukan proses simpan ke database
            $simpan = $admin->insert([
                        'nama_pelanggan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_pelanggan'), true)),
                        'email_pelanggan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('email_pelanggan'), true)),
                        'alamat_pelanggan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('alamat_pelanggan'), true)),
                        'password_pelanggan' => password_hash($this->request->getVar('password_pelanggan'), PASSWORD_DEFAULT),
                        'aktif_pelanggan' => 1,
                        'image_pelanggan' => $security->sanitizeFilename(htmlspecialchars('default.png'), true),
                        'telepon_pelanggan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('telepon_pelanggan'), true)),
                        'role_id' => 3,
                    ]);
            // jika berhasil simpan
            session()->setFlashdata('pesan', 'Berhasil daftar, silahkan login !');
            return redirect()->to('/auth');

        }
    }

    public function logout()
    {
        // hapus session
        session()->destroy();
        session()->setFlashdata('pesan', 'Anda telah logout !');
        return redirect()->to('/');
    }
}
