<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelPembelian;
use App\Models\ModelPembelianproduk;
use App\Models\ModelOngkir;

class Checkout extends BaseController
{
    public function index()
    {
        if (session()->get('role_id') == 3) {
            if (session()->keranjang) {
                # code...
                $produk = new ModelProduk();
                $ongkir = new ModelOngkir();
                $detail_produk = $produk->find($_SESSION['keranjang']);
                $view_ongkir = $ongkir->find();
                // dd(session('keranjang'));
                $data = [
                    'view_keranjang' => $detail_produk,
                    'view_ongkir' => $view_ongkir,
                    'validation' => \config\Services::validation()
                ];
                return view('pengunjung/checkout/checkout', $data);
            } else {
                // session()->setFlashdata('pesan', 'Berhasil, hapus produk !');
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function get_ongkir ()
    {
        if (session()->get('role_id') == 3) {
            if (session()->keranjang) {
                $ongkir = new ModelOngkir();
                // ambil data ongkir berdasarkan id ongkir yang dipilih user
                $id_ongkir = $this->request->getVar('id_ongkir');
                $data = $ongkir->find($id_ongkir);
                echo json_encode($data);
            } else {
                // session()->setFlashdata('pesan', 'Berhasil, hapus produk !');
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
        
    }

    public function proses_checkout()
    {
        if (session()->keranjang) {
            $security = \Config\Services::security();
            $ongkir = new ModelOngkir();
            $pembelian = new ModelPembelian();
            $pembelian_produk = new ModelPembelianproduk();
            $produk = new ModelProduk();
            
            // cek validasi login
            if (! $this->validate([
                    'id_ongkir' => [
                        'label'  => 'Ongkos kirim',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'alamat_pengiriman' => [
                        'label'  => 'Alamat pengiriman',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                    'metode_pembayaran' => [
                        'label'  => 'Metode pembayaran',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal checkout, belum ada ongkir yang dipilih');
                    return redirect()->to('/checkout')->withInput();
            } else {
                $id_pelanggan = $security->sanitizeFilename(htmlspecialchars(session()->id_pelanggan, true));
                $id_ongkir = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('id_ongkir'), true));
                $totalbelanja = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('total_belanja'), true));
                $tanggal_pembelian = $security->sanitizeFilename(htmlspecialchars(date("Y-m-d"), true));
                $alamat_pengiriman = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('alamat_pengiriman'), true));
                $metode_pembayaran = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('metode_pembayaran'), true));
                $biaya_ongkir = $ongkir->find($id_ongkir);
                $nama_kabupaten = $biaya_ongkir->nama_kabupaten;
                $biaya_ongkir = $biaya_ongkir->biaya_ongkir;
                // dd($biaya_ongkir);
                $total_pembelian = ((int)$totalbelanja + (int)$biaya_ongkir);

                // simpan data ke tabel pembelian
                $simpan = $pembelian->insert([
                            'id_pelanggan'      => $id_pelanggan,
                            'tanggal_pembelian' => $tanggal_pembelian,
                            'total_pembelian'   => $total_pembelian,
                            'id_ongkir'         => $id_ongkir,
                            'nama_kabupaten'    => $nama_kabupaten,
                            'tarif'             => $biaya_ongkir,
                            'alamat_pengiriman' => $alamat_pengiriman,
                            'metode_pembayaran' => $metode_pembayaran,
                        ]);

                // simpan data ketable pembelian produk
                // mencari id pembelian yang barusan terjadi
                // dd($pembelian->insertID);
                $id_pembelian_barusan = $pembelian->insertID;
                foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                    
                    // mendapatkan data produk berdasarkan id produk
                    $db      = \Config\Database::connect();
                    $builder = $db->table('produk');
                    $builder->where('id_produk', $id_produk);
                    $query = $builder->get(); 
                    $pecah = $query->getRow();
                    
                    // dd($pecah->nama_produk);
                    $nama = $pecah->nama_produk;
                    $harga = $pecah->harga_produk;
                    $berat = $pecah->berat_produk;
                    $subberat = ((int)$pecah->berat_produk * (int)$jumlah);
                    $subharga = ((int)$pecah->harga_produk * (int)$jumlah);

                    $simpan = $pembelian_produk->insert([
                            'id_pembelian'      => $id_pembelian_barusan,
                            'id_produk'         => $id_produk,
                            'jumlah_produk'     => $jumlah,
                            'nama'              => $nama,
                            'harga'             => $harga,
                            'berat'             => $berat,
                            'subberat'          => $subberat,
                            'subharga'          => $subharga
                        ]);

                    // update stok
                    $update = $produk->update_stok_produk($id_produk, $jumlah);
                }
                // hapus produk di keranjang
                unset($_SESSION['keranjang']);
                // jika berhasil simpan
                session()->setFlashdata('pesan', 'Berhasil, pembelian sukses !');
                return redirect()->to('/nota/' . htmlspecialchars($id_pembelian_barusan));
            }
        } else {
            // session()->setFlashdata('pesan', 'Berhasil, hapus produk !');
            return redirect()->to('/');
        }
          
    }
}
