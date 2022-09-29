<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOngkir extends Model
{
    
    protected $table            = 'ongkir';
    protected $primaryKey       = 'id_ongkir';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['biaya_ongkir', 'id_kecamatan'];

     public function view_ongkir()
    {
        return $this->findAll();
    }

    public function view_getongkir($id_kecamatan)
    {
        // getKota
        $db      = \Config\Database::connect();
        $builder = $db->table('ongkir');
        $builder->where('ongkir.id_kecamatan', $id_kecamatan);
        $query = $builder->get();
        return $query->getResult();
    }

}
