<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelPembelian;
use App\Models\ModelAuth;

class Riwayat extends BaseController
{
    public function index()
    {
        $id_pelanggan = session()->id_pelanggan;
        $pembelian = new ModelPembelian();
        $pelanggan = new ModelAuth();
        $pembelian = $pembelian->view_riwayat($id_pelanggan);
        // find by id pelanggan
        $pelanggan = $pelanggan->find($id_pelanggan);
        // dd($pembelian);
        $data = [
            'view_pembelian' => $pembelian,
            'view_detail_pembelian' => $pelanggan,
            'validation' => \config\Services::validation()
        ];
        return view('pengunjung/riwayat/riwayat', $data);
    }

}
