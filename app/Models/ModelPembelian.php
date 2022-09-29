<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembelian extends Model
{
    
    protected $table            = 'pembelian';
    protected $primaryKey       = 'id_pembelian';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id_pelanggan', 'tanggal_pembelian', 'total_pembelian', 'created_at', 'updated_at', 'id_ongkir', 'nama_kabupaten', 'tarif', 'alamat_pengiriman', 'status_pembelian', 'resi_pengiriman', 'metode_pembayaran'];

     public function view_pembelian()
    {
        // view
        $query = $this->db->table('pembelian')
                ->join('pelanggan','pelanggan.id_pelanggan=pembelian.id_pelanggan')
                ->get()->getResultArray();
        return $query;
    }

     public function view_detail_pembelian($id_pembelian)
    {
        // detail
        $db      = \Config\Database::connect();
        $builder = $db->table('pembelian');
        // $builder->select('pembelian.tanggal_pembelian, pelanggan.nama_pelanggan');
        $builder->join('pelanggan', 'pelanggan.id_pelanggan = pembelian.id_pelanggan','left');
        $builder->where('pembelian.id_pembelian', $id_pembelian);
        $query = $builder->get();
        return $query->getRow();
    }

     public function view_riwayat($id_pelanggan)
    {
        // detail
        $db      = \Config\Database::connect();
        $builder = $db->table('pembelian');
        $builder->where('pembelian.id_pelanggan', $id_pelanggan);
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function update_pembelian($id_pembelian)
	{
		$builder = $this->db->table('pembelian');
        $builder->set('status_pembelian', 'Sudah kirim pembayaran');
        $builder->where('id_pembelian', $id_pembelian);
        return $builder->update();
	}

    public function view_laporan_pembelian($tanggal_mulai, $tanggal_akhir)
    {
        $db = \Config\Database::connect();
        $ambil = $db->query("SELECT * FROM pembelian
                                INNER JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan  
                                WHERE tanggal_pembelian 
                                BETWEEN '$tanggal_mulai' 
                                AND '$tanggal_akhir'");
        $pecah = $ambil->getResultArray();
        return $pecah;
    }

}
