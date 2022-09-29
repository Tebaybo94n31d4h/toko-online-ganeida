<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembelianproduk extends Model
{
    
    protected $table            = 'pembelian_produk';
    protected $primaryKey       = 'id_pembelian_produk';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_pembelian', 'id_produk', 'jumlah_produk', 'nama', 'harga', 'berat', 'subberat', 'subharga'];

     public function view_pembelian_produk()
    {
        return $this->findAll();
    }

    public function view_detail_pembelian_produk($id_pembelian)
    {
        // detail
        $db      = \Config\Database::connect();
        $builder = $db->table('pembelian_produk');
        $builder->join('produk', 'produk.id_produk = pembelian_produk.id_produk','left');
        $builder->where('pembelian_produk.id_pembelian', $id_pembelian);
        $query = $builder->get();
        return $query->getResultArray();
    }

}
