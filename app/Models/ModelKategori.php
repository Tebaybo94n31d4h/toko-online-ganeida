<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table            = 'kategori_produk';
    protected $primaryKey       = 'id_kategori';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_kategori', 'aktif_kategori', 'image_kategori'];

     public function view_kategori_all()
    {
        return $this->findAll();
    }

    public function view_kategori() 
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('kategori_produk');
        $builder->where('kategori_produk.aktif_kategori', 1);
        $builder->orderBy('kategori_produk.id_kategori', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function view_produk_kategori ($id_kategori)
    {
        // join
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->select('produk.id_produk, produk.nama_produk, produk.harga_produk, produk.image_produk, produk.deskripsi_produk, produk.stok_produk, produk.aktif_produk, kategori_produk.nama_kategori, sub_kategori.nama_sub_kategori, satuan.nama_satuan');
        $builder->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori');
        $builder->join('sub_kategori', 'produk.id_sub_kategori = sub_kategori.id_sub_kategori');
        $builder->join('satuan', 'produk.id_satuan = satuan.id_satuan');
        $builder->where('produk.id_kategori', $id_kategori);
        $builder->where('produk.aktif_produk', 1);
        $builder->orderBy('produk.id_produk', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

}
