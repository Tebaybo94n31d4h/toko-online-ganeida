<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembelian;
use App\Models\ModelPembelianproduk;

class Nota extends BaseController
{
    public function index($id_pembelian_barusan)
    {
        $id_pembelian = $id_pembelian_barusan;
        $detail_pembelian = new ModelPembelian();
        $detail_pembelian_produk = new ModelPembelianproduk();
        $view_detail_pembelian = $detail_pembelian->view_detail_pembelian($id_pembelian);

        // ambil id pelanggan yang ada di sessiom
        $id_pelanggan_session = session()->id_pelanggan;

        // ambil id pelanggn di tabel pembelian
        $id_pelanggan = $view_detail_pembelian->id_pelanggan;
        
        if ($id_pelanggan_session == $id_pelanggan) {
            $view_detail_pembelian_produk = $detail_pembelian_produk->view_detail_pembelian_produk($id_pembelian);
            // dd($view_detail_pembelian);
            $data = [
                'view_detail_pembelian' => $view_detail_pembelian,
                'view_detail_pembelian_produk' => $view_detail_pembelian_produk,
                'validation' => \config\Services::validation()
            ];
            return view('pengunjung/nota/nota', $data);
        } else {
            return redirect()->to('/riwayat');
        }
    }

    public function hapus_produk_keranjang($id_produk)
    {
        $id_produk = $id_produk;
        unset($_SESSION['keranjang'][$id_produk]);
        return redirect()->to('/keranjang');
    }
}
