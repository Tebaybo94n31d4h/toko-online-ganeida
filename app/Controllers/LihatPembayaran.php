<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembelian;
use App\Models\ModelPembayaran;

class LihatPembayaran extends BaseController
{
    public function index($id_pembelian)
    {
        $id_pembelian = $id_pembelian;
        $pembelian = new ModelPembelian();
        $pembayaran = new ModelPembayaran();
        $datapembelian = $pembelian->view_detail_pembelian($id_pembelian);
        $datapembayaran = $pembayaran->view_detail_pembayaran($id_pembelian);
        // dd($datapembayaran);

        // ambil id pelanggan yang ada di sessiom
        $id_pelanggan_session = session()->id_pelanggan;
        // ambil id pelanggn di tabel pembelian
        $id_pelanggan = $datapembelian->id_pelanggan;

        if ($id_pelanggan_session == $id_pelanggan) {
            // jika datapembelian ko kosong maka redirect ke riwayat
            if ($datapembelian && $datapembayaran) {
                $data = [
                    'datapembayaran' => $datapembayaran,
                    'datapembelian' => $datapembelian,
                    'validation' => \config\Services::validation()
                ];
                return view('pengunjung/lihat_pembayaran/lihat_pembayaran', $data);
            } else {
                // jika datapembelian kosong maka redirect ke halaman awal
                session()->setFlashdata('pesan', 'Belum ada data pembayaran !');
                return redirect()->to(base_url('/riwayat'));
            }
            
        } else {
            session()->setFlashdata('pesan', 'Anda belum berbelanja !');
            return redirect()->to('/riwayat');
        }

        
    }

}
