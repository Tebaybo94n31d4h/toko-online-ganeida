<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembelian;

class Laporan extends BaseController
{
    public function index()
    {
        $model = new ModelPembelian();
        // $pembelian = $model->view_laporan_pembelian();
        $data = [
            'validation' => \config\Services::validation()
        ];
        return view('admin/customer/laporan/laporan', $data);
    }

    public function print($tanggal_mulai, $tanggal_akhir)
    {
        $model = new ModelPembelian();
        $pembelian = $model->view_laporan_pembelian($tanggal_mulai, $tanggal_akhir);
        $data = [
            'print' => $pembelian,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_akhir' => $tanggal_akhir
        ];
        return view('admin/customer/laporan/print', $data);
    }

}
