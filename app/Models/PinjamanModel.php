<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\PetugasModel;
use App\Models\AnggotaModel;

class PinjamanModel extends Model
{
    protected $table = 'pinjaman';
    protected $primaryKey = 'id_pinjaman';
    protected $allowedFields = ['id_anggota', 'id_petugas', 'jumlah_pinjaman', 'tanggal_pinjaman', 'tenor', 'status', 'persentase_bunga', 'bunga', 'total_pembayaran'];

    public function getStatusLabel($status)
    {
        switch ($status) {
            case 'approved':
                return '<span style="color: green;">Disetujui</span>';
            case 'rejected':
                return '<span style="color: red;">Ditolak</span>';
            case 'pending':
                return '<span style="color: orange;">Ditunda</span>';
            default:
                return '<span style="color: gray;">Tidak Diketahui</span>';
        }
    }
    // Metode untuk menghitung bunga
    public function hitungBunga($jumlahPinjaman, $persentaseBunga)
    {
        return ($jumlahPinjaman * $persentaseBunga) / 100;
    }

    // Metode untuk menghitung total pembayaran
    public function hitungTotalPembayaran($jumlahPinjaman, $persentaseBunga)
    {
        $bunga = $this->hitungBunga($jumlahPinjaman, $persentaseBunga);
        return $jumlahPinjaman + $bunga;
    }

    public function getPetugas($id)
    {
        $petugasModel = new PetugasModel();
        return $petugasModel->findById($id);
    }

    public function getAnggota($id)
    {
        $anggotaModel = new AnggotaModel();
        return $anggotaModel->findById($id);
    }


    public function findById($id)
    {
        return $this->where('id_pinjaman', $id)->first();
    }

    

}
