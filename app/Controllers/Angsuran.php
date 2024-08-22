<?php

namespace App\Controllers;

use App\Models\AngsuranModel;
use App\Models\AnggotaModel;
use CodeIgniter\Controller;

class Angsuran extends BaseController
{
    protected $AngsuranModel;
    protected $anggotaModel;

    public function __construct()
    {
        $this->AngsuranModel = new AngsuranModel();
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $model = new AngsuranModel();
        $data['angsuran'] = $model->findAll();

        foreach ($data['angsuran'] as &$angsuran) {
            $angsuran['status_label'] = $model->getStatusLabel($angsuran['status']);
        }

        return view('angsuran/index', $data);
    }

    public function create()
    {
        $data['anggota'] = $this->anggotaModel->findAll();
        return view('angsuran/create', $data);
    }

    public function store()
    {
        $this->AngsuranModel->save([
            'id_anggota' => $this->request->getPost('id_anggota'),
            'angsuran_pembayaran' => $this->request->getPost('angsuran_pembayaran'),
            'angsuran_ke' => $this->request->getPost('angsuran_ke'),
            'tanggal_bayar' => $this->request->getPost('tanggal_bayar'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/angsuran');
    }

    public function edit($id)
    {
        $data['angsuran'] = $this->AngsuranModel->find($id);
        $data['anggota'] = $this->anggotaModel->findAll(); // Untuk dropdown anggota
        return view('angsuran/edit', $data);
    }

    public function update($id)
    {
        $this->AngsuranModel->update($id, [
            'id_anggota' => $this->request->getPost('id_anggota'),
            'angsuran_pembayaran' => $this->request->getPost('angsuran_pembayaran'),
            'angsuran_ke' => $this->request->getPost('angsuran_ke'),
            'tanggal_bayar' => $this->request->getPost('tanggal_bayar'),
            'status' => $this->request->getPost('status')
        ]);
        return redirect()->to('/angsuran');
    }

    public function delete($id)
    {
        $this->AngsuranModel->delete($id);
        return redirect()->to('/angsuran');
    }
}
