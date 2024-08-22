<?php

namespace App\Models;

use CodeIgniter\Model;

class SimpananPokokModel extends Model
{
    protected $table = 'simpanan_pokok';
    protected $primaryKey = 'id_simpanan_pokok';
    protected $allowedFields = ['id_anggota', 'jumlah', 'tanggal'];

    // Jika ingin mengaktifkan timestamps otomatis
    // protected $useTimestamps = true;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';
}
