<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKota extends Model
{
    
    protected $table            = 'kota';
    protected $primaryKey       = 'id_kota';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_kota', 'id_provinsi'];

     public function view_kota()
    {
        return $this->findAll();
    }

     public function view_getkota($id_provinsi)
    {
        // getKota
        $db      = \Config\Database::connect();
        $builder = $db->table('kota');
        $builder->where('kota.id_provinsi', $id_provinsi);
        $query = $builder->get();
        return $query->getResult();
    }

}
