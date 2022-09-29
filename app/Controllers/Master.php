<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelSatuan;
use App\Models\ModelKategori;
use App\Models\ModelSubKategori;
use App\Models\ModelKategoripilihan;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html;

class Master extends BaseController
{
    public function produk()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $produk = new ModelProduk();
            $satuan = new ModelSatuan();
            $kategori = new ModelKategori();
            $subkategori = new ModelSubKategori();
            $kategoripilihan = new ModelKategoriPilihan();
            $produk = $produk-> view_produk_all_admin();
            $satuan_produk = $satuan->view_satuan_all();
            $kategori_produk = $kategori->view_kategori_all();
            $sub_kategori_produk = $subkategori->view_sub_kategori_all();
            $kategoripilihan = $kategoripilihan->view_kategori_pilihan_all();
            $data = [
                'view_produk' => $produk,
                'view_satuan_produk' => $satuan_produk,
                'view_kategori_produk' => $kategori_produk,
                'view_sub_kategori_produk' => $sub_kategori_produk,
                'view_kategori_pilihan' => $kategoripilihan,
                'validation' => \config\Services::validation()
            ];
            return view('admin/master/produk/produk', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }        
    }

    public function tambah_produk()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            // cek validasi login
            if (! $this->validate([
                    'id_kategori' => [
                        'label'  => 'Kategori produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'id_sub_kategori' => [
                        'label'  => 'Sub kategori',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'id_kategori_pilihan' => [
                        'label'  => 'Kategori pilihan produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'nama_produk' => [
                        'label'  => 'Nama produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'harga_produk' => [
                        'label'  => 'Harga produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'berat_produk' => [
                        'label'  => 'Berat produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'stok_produk' => [
                        'label'  => 'Stok produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'id_satuan' => [
                        'label'  => 'Satuan produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'image_produk' => [
                        'label'  => 'Image produk',
                        'rules'  => 'max_size[image_produk,1024]|is_image[image_produk]|mime_in[image_produk,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'max_size' => 'Ukuran {field} terlalu besar',
                            'is_image' => 'Yang anda pilih bukan {field}',
                            'mime_in' => 'Yang anda pilih bukan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/produk')->withInput();
            } else {

                // ambil image_produk
                $file_image_produk = $this->request->getFile('image_produk');

                // cek apakah ada gambar yang diupload
                if ($file_image_produk->getError() == 4) {
                    $nama_image_produk = 'default.jpg';
                } else {
                    // pindahkan file image_produk ke folder produk
                    $file_image_produk->move('admin/dist/assets/images/produk');
                    // ambil nama image_produk
                    $nama_image_produk = $file_image_produk->getName();
                }

                $produk = new ModelProduk();
                $security = \Config\Services::security();
                // lakukan proses simpan ke database
                $produk->insert([
                            'nama_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_produk'), true)),
                            'harga_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('harga_produk'), true)),
                            'berat_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('berat_produk'), true)),
                            'image_produk' => $security->sanitizeFilename(htmlspecialchars($nama_image_produk), true),
                            'deskripsi_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('deskripsi_produk'), true)),
                            'aktif_produk' => 1,
                            'stok_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('stok_produk'), true)),
                            'id_satuan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_satuan'), true)),
                            'id_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori'), true)),
                            'id_sub_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_sub_kategori'), true)),
                            'id_kategori_pilihan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori_pilihan'), true)),
                        ]);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, menambahkan produk baru !');
                return redirect()->to('/produk');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function edit_produk($id_produk)
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $produk = new ModelProduk();
            $satuan = new ModelSatuan();
            $kategori = new ModelKategori();
            $subkategori = new ModelSubKategori();
            $kategoripilihan = new ModelKategoriPilihan();
            $detail_produk = $produk->find($id_produk);
            $satuan_produk = $satuan->view_satuan_all();
            $kategori_produk = $kategori->view_kategori_all();
            $sub_kategori_produk = $subkategori->view_sub_kategori_all();
            $kategoripilihan = $kategoripilihan->view_kategori_pilihan_all();
            // dd($kategori_produk);
            $data = [
                'detail_produk' => $detail_produk,
                'view_satuan_produk' => $satuan_produk,
                'view_kategori_produk' => $kategori_produk,
                'view_sub_kategori_produk' => $sub_kategori_produk,
                'view_kategori_pilihan' => $kategoripilihan,
                'validation' => \config\Services::validation()
            ];
            return view('admin/master/produk/edit_produk', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function proses_ubah_produk()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $security = \Config\Services::security();
            // cek validasi login
            if (! $this->validate([
                    'id_kategori' => [
                        'label'  => 'Kategori produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'id_sub_kategori' => [
                        'label'  => 'Sub kategori',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'id_kategori_pilihan' => [
                        'label'  => 'Kategori pilihan produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'nama_produk' => [
                        'label'  => 'Nama produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'harga_produk' => [
                        'label'  => 'Harga produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'berat_produk' => [
                        'label'  => 'Berat produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'stok_produk' => [
                        'label'  => 'Stok produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'id_satuan' => [
                        'label'  => 'Satuan produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'image_produk' => [
                        'label'  => 'Image produk',
                        'rules'  => 'max_size[image_produk,1024]|is_image[image_produk]|mime_in[image_produk,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'max_size' => 'Ukuran {field} terlalu besar',
                            'is_image' => 'Yang anda pilih bukan {field}',
                            'mime_in' => 'Yang anda pilih bukan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/edit_produk/' . $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_produk'), true)),)->withInput();
            } else {

                // ambil image_produk
                $file_image_produk = $this->request->getFile('image_produk');

                // cek apakah ada gambar yang diupload
                if ($file_image_produk->getError() == 4) {
                    $nama_image_produk = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('image_produk_lama'), true));
                } else {
                    // pindahkan file image_produk ke folder produk
                    $file_image_produk->move('admin/dist/assets/images/produk');
                    // ambil nama image_produk
                    $nama_image_produk = $file_image_produk->getName();
                    // cek apakah file image_produk sama dengan default image_produk atau tidak (jika tidak maka hapus file image_produk lama) jika sama maka tidak dihapus  (jika tidak sama maka hapus file image_produk lama) 
                    if ($nama_image_produk != 'default.jpg') {
                        unlink('admin/dist/assets/images/produk/' . $security->sanitizeFilename(htmlspecialchars($this->request->getVar('image_produk_lama'), true)));
                    }

                    // unlink('admin/dist/assets/images/produk/' . $security->sanitizeFilename(htmlspecialchars($this->request->getVar('image_produk_lama'), true)));
                }

                $produk = new ModelProduk();
                // lakukan proses simpan ke database
                $produk->save([
                            'id_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_produk'), true)),
                            'nama_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_produk'), true)),
                            'harga_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('harga_produk'), true)),
                            'berat_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('berat_produk'), true)),
                            'image_produk' => $security->sanitizeFilename(htmlspecialchars($nama_image_produk), true),
                            'deskripsi_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('deskripsi_produk'), true)),
                            'aktif_produk' => 1,
                            'stok_produk' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('stok_produk'), true)),
                            'id_satuan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_satuan'), true)),
                            'id_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori'), true)),
                            'id_sub_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_sub_kategori'), true)),
                            'id_kategori_pilihan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori_pilihan'), true)),
                        ]);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, update produk !');
                return redirect()->to('/produk');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function hapus_produk()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $produk = new ModelProduk();
            $security = \Config\Services::security();
            $id_produk = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_produk'), true));
            $detail_produk = $produk->find($id_produk);
            // dd($detail_produk);

            if ($detail_produk->image_produk != 'default.jpg') {
                // hapus imgae_produk
                unlink('admin/dist/assets/images/produk/' . $detail_produk->image_produk);
            }

            $produk->delete($id_produk);
            session()->setFlashdata('pesan', 'Berhasil, hapus produk !');
            return redirect()->to('/produk');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function kategori()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $kategori = new ModelKategori();
            $kategori_produk = $kategori->view_kategori_all();
            $data = [
                'view_kategori_produk' => $kategori_produk,
                'validation' => \config\Services::validation()
            ];
            return view('admin/master/kategori/kategori', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }        
    }

     public function tambah_kategori()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            // cek validasi login
            if (! $this->validate([
                    'nama_kategori' => [
                        'label'  => 'Nama kategori',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'image_kategori' => [
                        'label'  => 'Image kategori',
                        'rules'  => 'max_size[image_kategori,1024]|is_image[image_kategori]|mime_in[image_kategori,image/jpg,image/jpeg,image/png,image/webp]',
                        'errors' => [
                            'max_size' => 'Ukuran {field} terlalu besar',
                            'is_image' => 'Yang anda pilih bukan {field}',
                            'mime_in' => 'Yang anda pilih bukan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/kategori')->withInput();
            } else {

                // ambil image_kategori
                $file_image_kategori = $this->request->getFile('image_kategori');

                // cek apakah ada gambar yang diupload
                if ($file_image_kategori->getError() == 4) {
                    $nama_image_kategori = 'default.jpg';
                } else {
                    // pindahkan file image_kategori ke folder produk
                    $file_image_kategori->move('admin/dist/assets/images/foto_kategori');
                    // ambil nama image_kategori
                    $nama_image_kategori = $file_image_kategori->getName();
                }
                
                $kategori = new ModelKategori();
                $security = \Config\Services::security();
                // lakukan proses simpan ke database
                $kategori->insert([
                            'nama_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_kategori'), true)),
                            'aktif_kategori' => 1,
                            'image_kategori' => $security->sanitizeFilename(htmlspecialchars($nama_image_kategori), true),
                        ]);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, menambahkan kategori baru !');
                return redirect()->to('/kategori');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function edit_kategori($id_kategori)
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $kategori = new ModelKategori();
            // kategori_produk berdasarkan id_kategori
            $kategori_produk = $kategori->find($id_kategori);
            $data = [
                'kategori_produk' => $kategori_produk,
                'validation' => \config\Services::validation()
            ];
            return view('admin/master/kategori/edit_kategori', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function proses_ubah_kategori()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $security = \Config\Services::security();
            // cek validasi login
            if (! $this->validate([
                    'nama_kategori' => [
                        'label'  => 'Nama kategori',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'image_kategori' => [
                        'label'  => 'Image kategori',
                        'rules'  => 'max_size[image_kategori,1024]|is_image[image_kategori]|mime_in[image_kategori,image/jpg,image/jpeg,image/png,image/webp]',
                        'errors' => [
                            'max_size' => 'Ukuran {field} terlalu besar',
                            'is_image' => 'Yang anda pilih bukan {field}',
                            'mime_in' => 'Yang anda pilih bukan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/kategori')->withInput();
            } else {

                // ambil image_kategori
                $file_image_kategori = $this->request->getFile('image_kategori');

                // cek apakah ada gambar yang diupload
                if ($file_image_kategori->getError() == 4) {
                    $nama_image_kategori = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('image_kategori_lama'), true));
                } else {
                    // pindahkan file image_kategori ke folder produk
                    $file_image_kategori->move('admin/dist/assets/images/foto_kategori');
                    // ambil nama image_kategori
                    $nama_image_kategori = $file_image_kategori->getName();

                    // cek apakah ada gambar yang lama dan dihapus atau tidak (jika tidak maka hapus gambar lama) 
                    if ($this->request->getVar('image_kategori_lama') != 'default.jpg') {
                        unlink('admin/dist/assets/images/foto_kategori/' . $security->sanitizeFilename(htmlspecialchars($this->request->getVar('image_kategori_lama'), true)));
                    }
                    
                }

                $kategori = new ModelKategori();
                // lakukan proses simpan ke database
                $kategori->save([
                            'id_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori'), true)),
                            'nama_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_kategori'), true)),
                            'aktif_kategori' => 1,
                            'image_kategori' => $security->sanitizeFilename(htmlspecialchars($nama_image_kategori), true),
                        ]);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, ubah kategori !');
                return redirect()->to('/kategori');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function hapus_kategori()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $kategori = new ModelKategori();
            $security = \Config\Services::security();
            $id_kategori = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori'), true));

            $kategori->delete($id_kategori);
            session()->setFlashdata('pesan', 'Berhasil, hapus kategori !');
            return redirect()->to('/kategori');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function sub_kategori($id_kategori)
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $sub_kategori = new ModelSubKategori();
            // save session
            session()->set('id_kategori', $id_kategori);

            $sub_kategori_produk = $sub_kategori->view_sub_kategori_by_id($id_kategori);
            $data = [
                'view_sub_kategori_produk' => $sub_kategori_produk,
                'validation' => \config\Services::validation()
            ];
            return view('admin/master/sub_kategori/sub_kategori', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }        
    }

    public function tambah_sub_kategori()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            // cek validasi login
            if (! $this->validate([
                    'nama_sub_kategori' => [
                        'label'  => 'Nama sub kategori',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/master/sub_kategori/' . session()->id_kategori)->withInput();
            } else {
                $sub_kategori = new ModelSubKategori();
                $security = \Config\Services::security();
                
                // lakukan proses simpan ke database
                $simpan = $sub_kategori->insert([
                            'nama_sub_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_sub_kategori'), true)),
                            'id_kategori' => $security->sanitizeFilename(htmlspecialchars(session()->id_kategori, true)),
                            'aktif_sub_kategori' => 1,
                        ]);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, menambahkan sub kategori baru !');
                return redirect()->to('/master/sub_kategori/' . session()->id_kategori);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function proses_ubah_sub_kategori()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $security = \Config\Services::security();
            // cek validasi login
            if (! $this->validate([
                    'nama_sub_kategori' => [
                        'label'  => 'Nama sub kategori',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/master/sub_kategori/' . session()->id_kategori)->withInput();
            } else {
                $sub_kategori = new ModelSubKategori();
                // lakukan proses simpan ke database
                $simpan = $sub_kategori->save([
                            'id_sub_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_sub_kategori'), true)),
                            'nama_sub_kategori' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_sub_kategori'), true)),
                            'id_kategori' => $security->sanitizeFilename(htmlspecialchars(session()->id_kategori, true)),
                            'aktif_sub_kategori' => 1,
                        ]);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, ubah sub kategori !');
                return redirect()->to('/master/sub_kategori/' . session()->id_kategori);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function hapus_sub_kategori()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $sub_kategori = new ModelSubKategori();
            $security = \Config\Services::security();
            $id_sub_kategori = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_sub_kategori'), true));

            $sub_kategori->delete($id_sub_kategori);
            session()->setFlashdata('pesan', 'Berhasil, hapus sub kategori !');
            return redirect()->to('/master/sub_kategori/' . session()->id_kategori);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function kategori_pilihan()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $kategoripilihan = new ModelKategoriPilihan();
            $kategori_pilihan = $kategoripilihan->findAll();
            $data = [
                'kategori_pilihan' => $kategori_pilihan,
                'validation' => \config\Services::validation()
            ];
            return view('admin/master/kategori_pilihan/kategori', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }        
    }

    public function tambah_kategori_pilihan()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            // cek validasi login
            if (! $this->validate([
                    'nama_kategori_pilihan' => [
                        'label'  => 'Nama kategori pilihan',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/kategori_pilihan')->withInput();
            } else {
                $kategoripilihan = new ModelKategoriPilihan();
                $security = \Config\Services::security();
                
                // lakukan proses simpan ke database
                $simpan = $kategoripilihan->insert([
                            'nama_kategori_pilihan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_kategori_pilihan'), true)),
                            'aktif_kategori_pilihan' => 1,
                        ]);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, menambahkan kategori pilihan baru !');
                return redirect()->to('/kategori_pilihan');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function proses_edit_kategori_pilihan()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $security = \Config\Services::security();
            // cek validasi login
            if (! $this->validate([
                    'nama_kategori_pilihan' => [
                        'label'  => 'Nama kategori pilihan',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/kategori_pilihan')->withInput();
            } else {
                $kategoripilihan = new ModelKategoripilihan();
                // lakukan proses simpan ke database
                $simpan = $kategoripilihan->save([
                            'id_kategori_pilihan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori_pilihan'), true)),
                            'nama_kategori_pilihan' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_kategori_pilihan'), true)),
                            'aktif_kategori_pilihan' => 1,
                        ]);

                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, ubah kategori pilihan !');
                return redirect()->to('/kategori_pilihan');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function hapus_kategori_pilihan()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $kategoripilihan = new ModelKategoripilihan();
            $security = \Config\Services::security();
            $id_kategori_pilihan = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_kategori_pilihan'), true));

            $kategoripilihan->delete($id_kategori_pilihan);
            session()->setFlashdata('pesan', 'Berhasil, hapus kategori pilihan !');
            return redirect()->to('/kategori_pilihan');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }
}
