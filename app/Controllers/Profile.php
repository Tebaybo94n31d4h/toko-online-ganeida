<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Profile extends BaseController
{
    public function index()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {

            // model admin
            $modelAdmin = new ModelAdmin();
            // find all
            $email = session()->email;
            $profile = $modelAdmin->Admin_by_email($email);
            // dd($profile);
            $data = [
                'title' => 'Profile',
                'profile' => $profile,
                // validation
                'validation' => \Config\Services::validation()

            ];
            return view('admin/profile/profile', $data);
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function proses_ubah_profile()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {

            $security = \Config\Services::security();
            // jika password tidak kosong
            if ($this->request->getPost('password') != '') {
                // cek validasi login
                if (! $this->validate([
                        'nama_lengkap' => [
                            'label'  => 'Nama Lengkap',
                            'rules'  => 'required',
                            'errors' => [
                                'required' => 'Semua akun harus menyediakan {field}',
                            ],
                        ],
                        'email' => [
                            'label'  => 'Email',
                            'rules'  => 'required|valid_email',
                            'errors' => [
                                'required' => 'Semua akun harus menyediakan {field}',
                                'valid_email' => '{field} tidak valid',
                            ],
                        ],
                        'password' => [
                            'label'  => 'Kata sandi',
                            'rules'  => 'trim|min_length[8]',
                            'errors' => [
                                'min_length' => '{field} anda terlalu pendek',
                            ],
                        ],

                    ])) {
                        // validation
                        $validation = \Config\Services::validation();
                        session()->setFlashdata('error', 'gagal');
                        return redirect()->to('/profile')->withInput()->with('validation', $validation);
                } else {
                    // ambil image
                    $file_image = $this->request->getFile('image');

                    // cek apakah ada gambar yang diupload
                    if ($file_image->getError() == 4) {
                        $nama_image = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('image_lama'), true));
                    } else {
                        // pindahkan file image ke folder produk
                        $file_image->move('admin/dist/assets/images/user');
                        // ambil nama image
                        $nama_image = $file_image->getName();

                        // cek apakah ada gambar yang lama dan dihapus atau tidak (jika tidak maka hapus gambar lama)
                        if ($this->request->getVar('image_lama') != 'default.png') {
                            unlink('admin/dist/assets/images/user/' . $this->request->getVar('image_lama'));
                        }
                    }
                    $admin = new ModelAdmin();
                    // lakukan proses simpan ke database
                    $admin->save([
                                'id' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_admin'), true)),
                                'nama_lengkap' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_lengkap'), true)),
                                'email' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('email'), true)),
                                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                                'aktif' => 1,
                                'image' => $security->sanitizeFilename(htmlspecialchars($nama_image), true),
                            ]);
                    session()->setFlashdata('pesan', 'berhasil, edit profile');
                    return redirect()->to('/profile');
                }
            
            } else {
                // jika password kosong
                // cek validasi login
                if (! $this->validate([
                        'nama_lengkap' => [
                            'label'  => 'Nama Lengkap',
                            'rules'  => 'required',
                            'errors' => [
                                'required' => 'Semua akun harus menyediakan {field}',
                            ],
                        ],
                        'email' => [
                            'label'  => 'Email',
                            'rules'  => 'required|valid_email',
                            'errors' => [
                                'required' => 'Semua akun harus menyediakan {field}',
                                'valid_email' => '{field} tidak valid',
                            ],
                        ],
                    ])) {
                        // validation
                        $validation = \Config\Services::validation();
                        session()->setFlashdata('error', 'gagal');
                        return redirect()->to('/profile')->withInput()->with('validation', $validation);
                } else {
                    // ambil image
                    $file_image = $this->request->getFile('image');

                    // cek apakah ada gambar yang diupload
                    if ($file_image->getError() == 4) {
                        $nama_image = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('image_lama'), true));
                    } else {
                        // pindahkan file image ke folder produk
                        $file_image->move('admin/dist/assets/images/user');
                        // ambil nama image
                        $nama_image = $file_image->getName();

                        // cek apakah ada gambar yang lama dan dihapus atau tidak (jika tidak maka hapus gambar lama)
                        if ($this->request->getVar('image_lama') != 'default.png') {
                            unlink('admin/dist/assets/images/user/' . $this->request->getVar('image_lama'));
                        }
                    }
                    $admin = new ModelAdmin();
                    // lakukan proses simpan ke database
                    $admin->save([
                                'id' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_admin'), true)),
                                'nama_lengkap' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_lengkap'), true)),
                                'email' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('email'), true)),
                                'aktif' => 1,
                                'image' => $security->sanitizeFilename(htmlspecialchars($nama_image), true),
                            ]);
                    session()->setFlashdata('pesan', 'berhasil, edit profile');
                    return redirect()->to('/profile');
                }
            }

        } else {
            return redirect()->to('/dashboard');
        }
    }

}
