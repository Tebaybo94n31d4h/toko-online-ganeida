<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatuan extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_satuan'];

     public function view_satuan_all()
    {
        return $this->findAll();
    }

}
