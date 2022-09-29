<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_produk', 'harga_produk', 'berat_produk', 'image_produk', 'deskripsi_produk', 'created_at', 'updated_at', 'aktif_produk', 'stok_produk', 'id_satuan', 'id_kategori', 'id_sub_kategori', 'id_kategori_pilihan'];

     public function view_produk()
    {
        return $this->findAll();
    }

    public function view_produk_all_admin ()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->select('produk.*, satuan.nama_satuan, kategori_produk.nama_kategori, sub_kategori.nama_sub_kategori');
        $builder->join('satuan', 'produk.id_satuan = satuan.id_satuan');
        $builder->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori');
        $builder->join('sub_kategori', 'produk.id_sub_kategori = sub_kategori.id_sub_kategori');
        $builder->orderBy('produk.id_produk', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function view_produk_all ()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->select('produk.*, satuan.nama_satuan, kategori_produk.nama_kategori, sub_kategori.nama_sub_kategori');
        $builder->join('satuan', 'produk.id_satuan = satuan.id_satuan');
        $builder->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori');
        $builder->join('sub_kategori', 'produk.id_sub_kategori = sub_kategori.id_sub_kategori');
        $builder->where('produk.aktif_produk', '1');
        $builder->orderBy('produk.id_produk', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function view_produk_pilihan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->select('produk.*, satuan.nama_satuan, kategori_produk.nama_kategori, sub_kategori.nama_sub_kategori, kategori_pilihan.nama_kategori_pilihan, kategori_pilihan.aktif_kategori_pilihan');
        $builder->join('satuan', 'produk.id_satuan = satuan.id_satuan');
        $builder->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori');
        $builder->join('sub_kategori', 'produk.id_sub_kategori = sub_kategori.id_sub_kategori');
        $builder->join('kategori_pilihan', 'produk.id_kategori_pilihan = kategori_pilihan.id_kategori_pilihan');
        $builder->where('produk.aktif_produk', '1');
        $builder->where('kategori_pilihan.aktif_kategori_pilihan', '1');
        $builder->orderBy('produk.id_produk', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function view_detail_produk($id_produk)
    {
        // detail
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->where('produk.id_produk', $id_produk);
        $query = $builder->get();
        return $query->getRow();
    }

    public function update_stok_produk($id_produk, $jumlah)
	{

        $query = ("UPDATE produk SET stok_produk = stok_produk - $jumlah WHERE id_produk = $id_produk");
        return $this->query($query);
	}

    // view_produk_by_kategori
    public function view_produk_by_kategori()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->select('produk.*, satuan.nama_satuan, kategori_produk.nama_kategori, sub_kategori.nama_sub_kategori');
        $builder->join('satuan', 'produk.id_satuan = satuan.id_satuan');
        $builder->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori');
        $builder->join('sub_kategori', 'produk.id_sub_kategori = sub_kategori.id_sub_kategori');
        $builder->where('produk.aktif_produk', '1');
        $builder->orderBy('produk.id_produk', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // view_produk_search
    public function view_produk_search($search_produk)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->select('produk.*, satuan.nama_satuan, kategori_produk.nama_kategori, sub_kategori.nama_sub_kategori');
        $builder->join('satuan', 'produk.id_satuan = satuan.id_satuan');
        $builder->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori');
        $builder->join('sub_kategori', 'produk.id_sub_kategori = sub_kategori.id_sub_kategori');
        $builder->where('produk.aktif_produk', '1');
        $builder->like('produk.nama_produk', $search_produk);
        // or like
        $builder->orLike('kategori_produk.nama_kategori', $search_produk);
        $builder->orderBy('produk.id_produk', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

}
