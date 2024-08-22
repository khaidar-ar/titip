<?php

namespace App\Controllers;

use App\Models\SaldoModel;
use App\Models\AnggotaModel;
use CodeIgniter\Controller;

class SaldoController extends Controller
{
    protected $saldoModel;
    protected $anggotaModel;

    public function __construct()
    {
        $this->saldoModel = new SaldoModel();
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data['saldo'] = $this->saldoModel->findAll();
        return view('saldo/index', $data);
    }

    public function create()
    {
        $data['anggota'] = $this->anggotaModel->findAll();
        return view('saldo/create', $data);
    }

    public function store()
    {
        $this->saldoModel->save([
            'id_anggota' => $this->request->getPost('id_anggota'),
            'saldo_wajib' => $this->request->getPost('saldo_wajib'),
            'saldo_pokok' => $this->request->getPost('saldo_pokok')
        ]);

        return redirect()->to('/saldo');
    }

    public function edit($id)
    {
        $data['saldo'] = $this->saldoModel->find($id);
        $data['anggota'] = $this->anggotaModel->findAll();
        return view('saldo/edit', $data);
    }

    public function update($id)
    {
        $this->saldoModel->update($id, [
            'id_anggota' => $this->request->getPost('id_anggota'),
            'saldo_wajib' => $this->request->getPost('saldo_wajib'),
            'saldo_pokok' => $this->request->getPost('saldo_pokok')
        ]);

        return redirect()->to('/saldo');
    }

    public function delete($id)
    {
        $this->saldoModel->delete($id);
        return redirect()->to('/saldo');
    }
}
