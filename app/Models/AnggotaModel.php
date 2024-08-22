<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['nama', 'alamat', 'telepon', 'email', 'tanggal_daftar'];

    public function findById($id)
    {
        return $this->where('id_anggota', $id)->first();
    }

}
