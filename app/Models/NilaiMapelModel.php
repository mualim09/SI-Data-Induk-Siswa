<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiMapelModel extends Model
{
    protected $table      = 'nilai';
    protected $primaryKey = '';
    protected $allowedFields = ['ID_SEMESTER', 'NISNI' . 'ID_MAPEL', 'TUGAS' . 'UTS' . 'UAS' . 'DESKRIPSI'];
}
