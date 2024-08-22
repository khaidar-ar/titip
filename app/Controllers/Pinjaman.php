<?php

namespace App\Controllers;

use App\Models\PinjamanModel;
use App\Models\AnggotaModel;
use App\Models\PetugasModel;
use CodeIgniter\Controller;

class Pinjaman extends BaseController
{

    protected $PinjamanModel;
    protected $anggotaModel;
    protected $petugasModel;

    public function __construct()
    {
        $this->PinjamanModel = new PinjamanModel();
        $this->anggotaModel = new AnggotaModel();
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        $model = new PinjamanModel();
        $data['pinjaman'] = $model->findAll();

        foreach ($data['pinjaman'] as &$pinjaman) {
            $pinjaman['id_pinjaman'] = $pinjaman['id_pinjaman'];
            $pinjaman['id_petugas'] = $pinjaman['id_petugas'];
            $pinjaman['id_anggota'] = $pinjaman['id_anggota'];
            $pinjaman['bunga'] = $model->hitungBunga($pinjaman['jumlah_pinjaman'], $pinjaman['persentase_bunga']);
            $pinjaman['total_pembayaran'] = $model->hitungTotalPembayaran($pinjaman['jumlah_pinjaman'], $pinjaman['persentase_bunga']);
            $pinjaman['status_label'] = $model->getStatusLabel($pinjaman['status']);
        }


        return view('pinjaman/index', $data);
    }

    public function create()
    {
        $data['anggota'] = $this->anggotaModel->findAll(); // Untuk dropdown anggota
        $data['petugas'] = $this->petugasModel->findAll(); // Untuk dropdown anggota
        return view('pinjaman/create', $data);
    }
    public function store()
    {
        $model = new PinjamanModel();

        $jumlahPinjaman = $this->request->getPost('jumlah_pinjaman');
        $persentaseBunga = $this->request->getPost('persentase_bunga');

        $bunga = $model->hitungBunga($jumlahPinjaman, $persentaseBunga);
        $totalPembayaran = $model->hitungTotalPembayaran($jumlahPinjaman, $persentaseBunga);

        $status = $this->request->getPost('status');

        if ($status == 'rejected') {
            return redirect()->back()->with('error', 'Proses tidak dapat dilanjutkan karena pinjaman ditolak.');
        }

        $model = new PinjamanModel();
        $model->save([
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'jumlah_pinjaman' => $jumlahPinjaman,
            'bunga' => $bunga,
            'tanggal_pinjaman' => $this->request->getPost('tanggal_pinjaman'),
            'tenor' => $this->request->getPost('tenor'),
            'status' => $this->request->getPost('status'),
            'persentase_bunga' => $persentaseBunga,
            'total_pembayaran' => $totalPembayaran
        ]);
        return redirect()->to('/pinjaman');
    }

    public function edit($id)
    {
        $model = new PinjamanModel();
        $data['pinjaman'] = $model->find($id);
        $data['anggota'] = $this->anggotaModel->findAll(); // Untuk dropdown anggota
        $data['petugas'] = $this->petugasModel->findAll(); // Untuk dropdown anggota
        return view('pinjaman/edit', $data);
    }

    public function update($id)
    {

        $jumlahPinjaman = $this->request->getPost('jumlah_pinjaman');
        $persentaseBunga = $this->request->getPost('persentase_bunga');

        $bunga = $this->PinjamanModel->hitungBunga($jumlahPinjaman, $persentaseBunga);
        $totalPembayaran = $this->PinjamanModel->hitungTotalPembayaran($jumlahPinjaman, $persentaseBunga);

        $this->PinjamanModel->update($id, [
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'jumlah_pinjaman' => $jumlahPinjaman,
            'bunga' => $bunga,
            'tanggal_pinjaman' => $this->request->getPost('tanggal_pinjaman'),
            'tenor' => $this->request->getPost('tenor'),
            'status' => $this->request->getPost('status'),
            'persentase_bunga' => $persentaseBunga,
            'total_pembayaran' => $totalPembayaran
        ]);
        
        return redirect()->to('/pinjaman');
    }

    public function delete($id)
    {
        $model = new PinjamanModel();
        $model->delete($id);
        return redirect()->to('/pinjaman');
    }

    public function detail($id)
    {
        $model = new PinjamanModel();
        $modelPetugas = new PetugasModel();
        $modelAnggota = new AnggotaModel();
        $pinjaman= $model->findById($id);
        if ($pinjaman !== null) {
        $petugasResult = $modelPetugas->findById($pinjaman['id_petugas']);
        $anggotaResult = $modelAnggota->findById($pinjaman['id_anggota']);
        $data['petugas'] = $petugasResult['nama'];
        $data['anggota'] = $anggotaResult['nama'];
        $data['pinjaman'] = $pinjaman;
        return view('pinjaman/detail', $data);
        
        }
    }
}
