<?php

namespace App\Controllers;

use App\Models\CrudModel;

class Crud extends BaseController
{
    protected $crudModel;
    public function __construct()
    {
        $this->crudModel = new CrudModel();
    }
    public function index()
    {

        $data = [
            'title' => ('Newbie Crud'),
            'crud' => $this->crudModel->getCrud()
        ];

        return view('index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data'
        ];

        return view('create', $data);
    }

    public function save()
    {
        $this->crudModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
        return redirect()->to(base_url() . '/');
    }

    public function delete($id)
    {
        $this->crudModel->delete($id);

        return redirect()->to(base_url() . '/');
    }

    public function edit($id)
    {
        $data = [
            'title' => ('Form Update'),
            'crud' => $this->crudModel->getCrud($id)
        ];

        return view('/edit', $data);
    }

    public function update($id)
    {
        $this->crudModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil diupdate');
        return redirect()->to(base_url() . '/');
    }
}
