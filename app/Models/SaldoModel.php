<?php

namespace App\Models;

use CodeIgniter\Model;

class SaldoModel extends Model
{
    protected $table = 'saldo';
    protected $primaryKey = 'id_saldo';
    protected $allowedFields = ['id_anggota', 'saldo_wajib', 'saldo_pokok'];

    // Jika ingin mengaktifkan timestamps otomatis
    // protected $useTimestamps = true;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';
}
