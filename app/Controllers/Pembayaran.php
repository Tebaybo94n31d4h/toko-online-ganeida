<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembelian;
use App\Models\ModelPembayaran;

class Pembayaran extends BaseController
{
    public function index($id_pembelian)
    {
        $id_pembelian = $id_pembelian;
        $pembelian = new ModelPembelian();
        $datapembelian = $pembelian->view_detail_pembelian($id_pembelian);

        // ambil id pelanggan yang ada di sessiom
        $id_pelanggan_session = session()->id_pelanggan;
        // ambil id pelanggn di tabel pembelian
        $id_pelanggan = $datapembelian->id_pelanggan;
        // dd($datapembelian);

        if ($id_pelanggan_session == $id_pelanggan) {
            $data = [
                'datapembelian' => $datapembelian,
                'validation' => \config\Services::validation()
            ];
            return view('pengunjung/pembayaran/pembayaran', $data);
        } else {
            return redirect()->to('/riwayat');
        }

        
    }

    public function proses_pembayaran()
    {
        $security = \Config\Services::security();
        // cek validasi login
         if (! $this->validate([
                    'nama_lengkap' => [
                        'label'  => 'Nama lengkap',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'bank' => [
                        'label'  => 'Bank',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'jumlah' => [
                        'label'  => 'Jumlah',
                        'rules'  => 'required|numeric',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                            'numeric' => '{field} harus berupa angka',
                        ],
                    ],
                    'bukti_pembayaran' => [
                        'label'  => 'Gambar Bukti Pembayaran',
                        'rules'  => 'max_size[bukti_pembayaran,2048]|is_image[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'max_size' => 'Ukuran {field} terlalu besar',
                            'is_image' => 'Yang anda pilih bukan {field}',
                            'mime_in' => 'Yang anda pilih bukan {field}',
                        ],
                    ],
                ])) {
                    $id_pembelian = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_pembelian'), true));
                    session()->setFlashdata('error', 'gagal');
                    return redirect()->to('pembayaran/' . htmlspecialchars($id_pembelian))->withInput();
            } else {
                
                // ambil bukti_pembayaran
                $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');

                // pindahkan file bukti_pembayaran ke folder produk
                $bukti_pembayaran->move('admin/dist/assets/images/bukti_pembayaran');
                // ambil nama bukti_pembayaran
                $nama_bukti_pembayaran = $bukti_pembayaran->getName();

                $pembayaran = new ModelPembayaran();
                $pembelian = new ModelPembelian();
                $id_pembelian = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_pembelian'), true));
                // lakukan proses simpan ke database
                $simpan = $pembayaran->insert([
                            'id_pembelian' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_pembelian'), true)),
                            'nama_lengkap' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('nama_lengkap'), true)),
                            'bank' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('bank'), true)),
                            'jumlah' => $security->sanitizeFilename(htmlspecialchars($this->request->getVar('jumlah'), true)),
                            'tanggal_pembayaran' => date("Y-m-d"),
                            'bukti_pembayaran' => $security->sanitizeFilename(htmlspecialchars($nama_bukti_pembayaran), true),
                        ]);
                // jika berhasil simpan
                // update data pending
                $update = $pembelian->update_pembelian($id_pembelian);
                
                session()->setFlashdata('pesan', 'Berhasil, terimakasih telah melakukan pembayaran !');
                return redirect()->to('/riwayat');

            }
    }
}
