<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\AnggotaModel;
use App\Models\PetugasModel;
use CodeIgniter\Controller;

class TransaksiController extends Controller
{
    protected $transaksiModel;
    protected $anggotaModel;
    protected $petugasModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->anggotaModel = new AnggotaModel();
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksiModel->findAll();
        return view('transaksi/index', $data);
    }

    public function create()
    {
        $data['anggota'] = $this->anggotaModel->findAll();
        $data['petugas'] = $this->petugasModel->findAll();
        return view('transaksi/create', $data);
    }

    public function store()
    {
        $this->transaksiModel->save([
            'id_anggota' => $this->request->getPost('id_anggota'),
            // 'id_petugas' => $this->request->getPost('id_petugas'),
            'jenis_transaksi' => $this->request->getPost('jenis_transaksi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal')
        ]);

        return redirect()->to('/transaksi');
    }

    public function edit($id)
    {
        $data['transaksi'] = $this->transaksiModel->find($id);
        $data['anggota'] = $this->anggotaModel->findAll();
        $data['petugas'] = $this->petugasModel->findAll();
        return view('transaksi/edit', $data);
    }

    public function update($id)
    {
        $this->transaksiModel->update($id, [
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'jenis_transaksi' => $this->request->getPost('jenis_transaksi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal')
        ]);

        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $this->transaksiModel->delete($id);
        return redirect()->to('/transaksi');
    }
}
