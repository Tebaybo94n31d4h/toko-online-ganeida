<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembelian;
use App\Models\ModelPembelianproduk;
use App\Models\ModelAuth;
use App\Models\ModelPembayaran;

class Customer extends BaseController
{
    public function pembelian()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $pembelian = new ModelPembelian();
            $pembelian = $pembelian->view_pembelian();
            $data = [
                'view_pembelian' => $pembelian,
                'validation' => \config\Services::validation()
            ];
            return view('admin/customer/pembelian/pembelian', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function detail_pembelian($id_pembelian)
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $detail_pembelian = new ModelPembelian();
            $detail_pembelian_produk = new ModelPembelianproduk();
            $view_detail_pembelian = $detail_pembelian->view_detail_pembelian($id_pembelian);
            $view_detail_pembelian_produk = $detail_pembelian_produk->view_detail_pembelian_produk($id_pembelian);
            // dd($view_detail_pembelian);
            $data = [
                'view_detail_pembelian' => $view_detail_pembelian,
                'view_detail_pembelian_produk' => $view_detail_pembelian_produk,
                'validation' => \config\Services::validation()
            ];
            return view('admin/customer/pembelian/detail_pembelian', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function pelanggan()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $pelanggan = new ModelAuth();
            $pelanggan = $pelanggan->view_pelanggan();
            $data = [
                'view_pelanggan' => $pelanggan,
                'validation' => \config\Services::validation()
            ];
            return view('admin/customer/pelanggan/pelanggan', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function hapus_pelanggan()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $pelanggan = new ModelAuth();
            $security = \Config\Services::security();
            $id_pelanggan = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_pelanggan'), true));

            $pelanggan->delete($id_pelanggan);
            session()->setFlashdata('pesan', 'Berhasil, hapus pelanggan !');
            return redirect()->to('/pelanggan');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function lihat_pembayaran ($id_pembelian)
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $pembayaran = new ModelPembayaran();
            $pembayaran = $pembayaran->view_pembayaran_by_id($id_pembelian);
            // dd($pembayaran);
            $data = [
                'view_pembayaran' => $pembayaran,
                'validation' => \config\Services::validation()
            ];
            return view('admin/customer/pembayaran/pembayaran', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function proses_lihat_pembayaran ($id_pembelian)
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $security = \Config\Services::security();
            // cek validasi login
            if (! $this->validate([
                    'nomor_resi' => [
                        'label'  => 'Nomor Resi',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'status' => [
                        'label'  => 'Status',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('/lihat_pembayaran/' . htmlspecialchars($id_pembelian))->withInput();
            } else {
                
                // ambil nomor resi dari form input dan status dari form input 
                $nomor_resi = $security->sanitizeFilename($this->request->getPost('nomor_resi'));
                $status = $security->sanitizeFilename($this->request->getPost('status'));

                // db connection
                $db = \Config\Database::connect();
                $builder = $db->table('pembelian');
                $builder->set('status_pembelian', $status);
                $builder->set('resi_pengiriman', $nomor_resi);
                $builder->where('id_pembelian', $id_pembelian);
                $builder->update();
                
                session()->setFlashdata('pesan', 'Berhasil, kirim nomor resi !');
                return redirect()->to('/pembelian');

            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function ubah_status_pembelian()
    {
        if (session()->role_id == 1 || session()->role_id == 2) {
            $security = \Config\Services::security();
            // cek validasi login
            if (! $this->validate([
                    'status_pembelian' => [
                        'label'  => 'Status',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal, Status wajib dipilih !');
                    return redirect()->to('/pembelian')->withInput();
            } else {
                
                // ambil id pembelian dari form input dan status dari form input 
                $id_pembelian = $security->sanitizeFilename($this->request->getPost('id_pembelian'));
                $status = $security->sanitizeFilename($this->request->getPost('status_pembelian'));

                // db connection
                $db = \Config\Database::connect();
                $builder = $db->table('pembelian');
                $builder->set('status_pembelian', $status);
                $builder->where('id_pembelian', $id_pembelian);
                $builder->update();
                
                session()->setFlashdata('pesan', 'Berhasil, ubah status !');
                return redirect()->to('/pembelian');

            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }
}
