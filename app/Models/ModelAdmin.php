<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama_lengkap', 'email', 'password', 'aktif', 'image', 'role_id', 'created_at', 'updated_at'];

    // by email
    public function Admin_by_email($email)
    {
        return $this->where('email', $email)->first();
    }

}
