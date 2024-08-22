<?php

namespace App\Models;

use CodeIgniter\Model;

class AngsuranModel extends Model
{
    protected $table = 'angsuran';
    protected $primaryKey = 'id_angsuran';
    protected $allowedFields = ['id_anggota', 'angsuran_pembayaran','angsuran_ke', 'tanggal_bayar', 'status'];

    public function getStatusLabel($status)
    {
        switch ($status) {
            case 'dibayar':
                return '<span style="color: green;">Dibayar</span>';
            case 'tertunda':
                return '<span style="color: red;">Tertunda</span>';
            default:
                return '<span style="color: gray;">Tidak Diketahui</span>';
        }
    }

}


