<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;

class Keranjang extends BaseController
{
    public function index()
    {
        if (session()->keranjang) {
            # code...
            $produkk = new ModelProduk();
            $detail_produk = $produkk->find($_SESSION['keranjang']);
            // dd($detail_produk);
            $data = [
                'view_keranjang' => $detail_produk,
                'validation' => \config\Services::validation()
            ];
            return view('pengunjung/keranjang/keranjang', $data);
        } else {
            session()->setFlashdata('pesan', 'Keranjang kosong, silahkan belanja untuk mengisi keranjang anda !');
            return redirect()->to('/');
        }
    }

    public function hapus_produk_keranjang($id_produk)
    {
        $id_produk = $id_produk;
        unset($_SESSION['keranjang'][$id_produk]);
        return redirect()->to('/keranjang');
    }
}
