<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_anggota', 'id_petugas', 'jenis_transaksi', 'jumlah', 'tanggal'];
}
