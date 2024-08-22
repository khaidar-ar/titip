<?php

namespace App\Models;

use CodeIgniter\Model;

class SimpananWajibModel extends Model
{
    protected $table = 'simpanan_wajib';
    protected $primaryKey = 'id_simpanan_wajib';
    protected $allowedFields = ['id_anggota', 'jumlah', 'tanggal'];

    // Jika Anda ingin mengaktifkan timestamps otomatis
    // protected $useTimestamps = true;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';
}
