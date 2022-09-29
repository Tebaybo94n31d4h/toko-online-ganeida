<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKecamatan extends Model
{
    
    protected $table            = 'kecamatan';
    protected $primaryKey       = 'id_kecamatan';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_kecamatan', 'id_kota'];

     public function view_kecamatan()
    {
        return $this->findAll();
    }

    public function view_getkecamatan($id_kota)
    {
        // getKota
        $db      = \Config\Database::connect();
        $builder = $db->table('kecamatan');
        $builder->where('kecamatan.id_kota', $id_kota);
        $query = $builder->get();
        return $query->getResult();
    }

}
