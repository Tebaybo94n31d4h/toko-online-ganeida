<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategoripilihan extends Model
{
    protected $table            = 'kategori_pilihan';
    protected $primaryKey       = 'id_kategori_pilihan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_kategori_pilihan', 'aktif_kategori_pilihan'];

     public function view_kategori_pilihan_all()
    {
        return $this->findAll();
    }

}
