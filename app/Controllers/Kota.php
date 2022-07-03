<?php

namespace App\Controllers;

use App\Models\KotaModel;
use App\Models\AdminModel;

class Kota extends BaseController
{
  protected $KotaModel;
  protected $AdminModel;

  public function __construct()
  {
    $this->KotaModel = new KotaModel();
    $this->AdminModel = new AdminModel();
  }

  public function index()
  {
    $data = [
      'dataKota' => $this->KotaModel->findAll(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];

    return view('admin/kota/index', $data);
  }
  public function tambah()
  {
    $data = [
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];
    return view('admin/kota/tambah', $data);
  }

  public function edit($id = null)
  {
    $data = [
      'kota' => $this->KotaModel->where('id', $id)->first(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];

    return view('admin/kota/edit', $data);
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

  public function prosesEdit()
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

    $id = $this->request->getVar('id');

    $data = [
      'nama' => $this->request->getVar('nama')
    ];

    $this->KotaModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil diperbarui');
    return redirect()->to('admin/kota');
  }

  public function delete($id)
  {
    $this->KotaModel->delete($id);
    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect()->to('admin/kota');
  }
}
