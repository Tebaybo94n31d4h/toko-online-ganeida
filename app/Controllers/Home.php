<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelPembelian;
use DOTNET;

class Home extends BaseController
{
    public function index()
    {
        $produkk = new ModelProduk();
        $kategori = new ModelKategori();
        $produk = $produkk->view_produk_all();
        $view_produk_pilihan = $produkk->view_produk_pilihan();
        // dd($view_produk_pilihan);
        $kategori = $kategori->view_kategori();
        $data = [
            'view_produk' => $produk,
            'view_kategori' => $kategori,
            'view_produk_pilihan' => $view_produk_pilihan,
            'validation' => \config\Services::validation()
        ];
        return view('pengunjung/home', $data);
    }

    public function beli($id_produk)
    {
        if (isset($_SESSION['keranjang'][$id_produk])) {
            $_SESSION['keranjang'][$id_produk]+=1;
        } else {
            $_SESSION['keranjang'][$id_produk] = 1;
        }

        session()->setFlashdata('pesan', 'Produk telah masuk ke keranjang belanja !');
        return redirect()->to('/keranjang');
    }

    public function detail_produk($id_produk)
    {
        $produkk = new ModelProduk();
        $produk = $produkk->find($id_produk);
        $produk_all = $produkk->view_produk_all();
        $data = [
            'view_produk' => $produk,
            'view_produk_all' => $produk_all,
            'validation' => \config\Services::validation()
        ];
        return view('pengunjung/detail_produk', $data);
    }

    public function detail_produk_beli($id_produk)
    {
        $security = \Config\Services::security();
         // cek validasi login
            if (! $this->validate([
                    'jumlah_produk' => [
                        'label'  => 'Jumlah produk',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Semua akun harus menyediakan {field}',
                        ],
                    ],
                ])) {
                    session()->setFlashdata('error', 'gagal beli, belum ada jumlah yang diisi');
                    return redirect()->to('home/detail_produk/' . $id_produk)->withInput();
            } else {
                $jumlah_produk = $security->sanitizeFilename(htmlspecialchars($this->request->getVar('jumlah_produk'), true));
                $_SESSION['keranjang'][$id_produk] = $jumlah_produk;
                session()->setFlashdata('pesan', 'Produk telah masuk ke keranjang belanja !');
                return redirect()->to('/keranjang');
            }
    }

    public function hasil_pencarian()
    {
        $produkk = new ModelProduk();
        $search_produk = $this->request->getVar('search_produk');
        // dd($search_produk);
        $produk = $produkk->view_produk_search($search_produk);
        // dd($produk);
        $data = [
            'view_produk' => $produk,
            'search_produk' => $search_produk,
            'validation' => \config\Services::validation()
        ];
        return view('pengunjung/hasil_pencarian', $data);
    }

    public function produk()
    {
        $produkk = new ModelProduk();
        // model kategori
        $kategori = new ModelKategori();
        $kategori = $kategori->view_kategori();
        $produk = $produkk->view_produk_by_kategori();
        $data = [
            'view_produk' => $produk,
            'view_kategori' => $kategori,
            'validation' => \config\Services::validation()
        ];
        return view('pengunjung/produk/produk', $data);
    }

}
