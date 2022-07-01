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

  public function prosestambah()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama kota harus diisi'
        ]
      ]
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'nama' => $this->request->getVar('nama')
    ];

    $this->KotaModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('admin/kota');
  }
}
