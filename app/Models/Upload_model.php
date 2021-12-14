<?php

namespace App\Models;

use CodeIgniter\Model;

class Upload_model extends Model
{
    protected $table      = 'uploads';

    public function insertGambar($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
