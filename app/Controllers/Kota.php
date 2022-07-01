<?php

namespace App\Controllers;

use App\Models\KotaModel;

class Kota extends BaseController
{
  protected $KotaModel;

  public function __construct()
  {
    $this->KotaModel = new KotaModel();
  }

  public function index()
  {
    $data = [
      'dataKota' => $this->KotaModel->findAll()
    ];

    return view('admin/kota/index', $data);
  }

  public function tambah()
  {
    return view('admin/kota/tambah');
  }

  public function edit($id = null)
  {
    $data = [
      'kota' => $this->KotaModel->where('id', $id)
    ];

    return view('admin/kota/edit', $data);
  }

  public function prosesTambah()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama kota tidak boleh kosong'
        ]
      ]
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    $data = [
      'nama' => $this->request->getVar('nama')
    ];

    $this->KotaModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('/admin/kota');
  }

  public function prosesEdit()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama kota tidak boleh kosong'
        ]
      ]
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    $id = $this->request->getVar('id');

    $data = [
      'nama' => $this->request->getVar('nama')
    ];

    $this->KotaModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil diperbarui');
    return redirect()->to('/admin/kota');
  }

  public function delete($id = null)
  {
    $this->KotaModel->delete($id);
    session()->setFlashdata('error', 'Data berhasi dihapus');
    return redirect()->to('/admin/kota');
  }
}
