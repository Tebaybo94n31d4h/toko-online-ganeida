<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;
use App\Models\ModelSubKategori;
use App\Models\ModelProduk;

class Kategori extends BaseController
{
    public function index($id_kategori)
    {
        $kategori = new ModelKategori();
        $sub_kategori = new ModelSubKategori();
        $produk = new ModelProduk();
        $kategori_view = $kategori->view_produk_kategori($id_kategori);
        $kategori_by_id = $kategori->find($id_kategori);
        $sub_kategori = $sub_kategori->view_sub_kategori_by_id($id_kategori);
        $produk = $produk->view_produk_all();

        $kategori_produk = $kategori->view_kategori();

        $data = [
            'view_kategori' => $kategori_view,
            'view_sub_kategori' => $sub_kategori,
            'id_kategori' => $id_kategori,
            'view_kategori_by_id' => $kategori_by_id,
            'view_produk' => $produk,
            'view_kategori_produk' => $kategori_produk,
            'validation' => \config\Services::validation()
        ];
        return view('pengunjung/kategori/kategori', $data);
    }

}
