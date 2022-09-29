<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProvinsi extends Model
{
    
    protected $table            = 'provinsi';
    protected $primaryKey       = 'id_provinsi';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_provinsi'];

     public function view_provinsi()
    {
        return $this->findAll();
    }

}
