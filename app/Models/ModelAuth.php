<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id_pelanggan';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_pelanggan', 'email_pelanggan', 'password_pelanggan', 'aktif_pelanggan', 'image_pelanggan', 'created_at', 'updated_at', 'telepon_pelanggan', 'role_id', 'alamat_pelanggan'];

     public function view_pelanggan()
    {
        return $this->findAll();
    }

}
