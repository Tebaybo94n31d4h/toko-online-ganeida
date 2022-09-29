<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembayaran extends Model
{
    
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id_pembelian', 'nama_lengkap', 'bank', 'jumlah', 'tanggal_pembayaran', 'bukti_pembayaran', 'created_at', 'updated_at'];

     public function view_pembayaran()
    {
        return $this->findAll();
    }

    public function view_pembayaran_by_id($id_pembelian)
    {
        return $this->where('id_pembelian', $id_pembelian)->first();  
    }

    public function view_detail_pembayaran ($id_pembelian)
    {
        // db connection
        $db = \Config\Database::connect();
        // builder
        $builder = $db->table('pembayaran');
        // select
        $builder->select('*');
        // join
        $builder->join('pembelian', 'pembelian.id_pembelian = pembayaran.id_pembelian','left');
        // where
        $builder->where('pembayaran.id_pembelian', $id_pembelian);
        // get
        $query = $builder->get();
        // return
        return $query->getRow();
    }

}
