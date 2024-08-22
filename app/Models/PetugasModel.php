<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = ['nama', 'telepon', 'email', 'tanggal_masuk'];

    public function findById($id)
    {
        return $this->where('id_petugas', $id)->first();
    }

}
