<?php

namespace App\Models;

use CodeIgniter\Model;

class Sub_KelasModel extends Model
{
    protected $table      = 'sub_kelas';
    protected $primaryKey = 'ID_SUB_KLS';
    protected $allowedFields = ['ID_SUB_KLS', 'ID_KARYAWAN', 'ID_KELAS', 'NAMA_SUB_KELAS'];
}
