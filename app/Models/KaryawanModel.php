<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'Karyawan';
    protected $primaryKey = 'ID_KARYAWAN';
    protected $allowedFields = ['ID_KARYAWAN', 'ID_JABATAN' . 'NIP', 'STATUS_KARYAWAN' . 'PASSWORD_KARYAWAN'];
}
