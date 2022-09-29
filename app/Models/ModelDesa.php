<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDesa extends Model
{
    
    protected $table            = 'desa';
    protected $primaryKey       = 'id_desa';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_desa', 'id_kecamatan'];

     public function view_desa()
    {
        return $this->findAll();
    }

    public function view_getdesa($id_kecamatan)
    {
        // getKota
        $db      = \Config\Database::connect();
        $builder = $db->table('desa');
        $builder->where('desa.id_kecamatan', $id_kecamatan);
        $query = $builder->get();
        return $query->getResult();
    }

}
