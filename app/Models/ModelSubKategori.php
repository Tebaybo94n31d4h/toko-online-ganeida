<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSubKategori extends Model
{
    protected $table            = 'sub_kategori';
    protected $primaryKey       = 'id_sub_kategori';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_sub_kategori', 'id_kategori', 'aktif_sub_kategori'];

     public function view_sub_kategori_all()
    {
        return $this->findAll();
    }

    // by id
    public function view_sub_kategori_by_id($id_kategori)
    {
        // result
        $db      = \Config\Database::connect();
        $builder = $db->table('sub_kategori');
        // distinct
        $builder->distinct('sub_kategori.nama_sub_kategori', 1);
        $builder->where('sub_kategori.id_kategori', $id_kategori);
        $builder->orderBy('sub_kategori.id_sub_kategori', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

}
