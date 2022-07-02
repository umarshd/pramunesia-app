<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\TransaksiModel;
use App\Models\CustomModel;
use App\Models\PemanduModel;
use App\Models\WisatawanModel;

class Transaksi extends BaseController
{
  protected $AdminModel;
  protected $TransaksiModel;
  protected $CustomModel;
  protected $PemanduModel;
  protected $WisatawanModel;

  public function __construct()
  {
    $this->AdminModel = new AdminModel();
    $this->TransaksiModel = new TransaksiModel();
    $this->CustomModel = new CustomModel();
    $this->PemanduModel = new PemanduModel();
    $this->WisatawanModel = new WisatawanModel();
  }

  public function index()
  {
    $data = [
      'dataTransaksi' => $this->CustomModel->dataTransaksi()
    ];

    return view('/admin/transaksi/index', $data);
  }

  public function edit($id = null)
  {
    $data = [
      'transaksi' => $this->CustomModel->dataTransaksiById($id)[0]
    ];

    return view('admin/transaksi/edit', $data);
  }

  public function prosesEdit()
  {
    $status = $this->request->getVar('status');

    $id = $this->request->getVar('id');

    $data = [
      'status' => $status
    ];

    $this->TransaksiModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil diperbarui');
    return redirect()->to('/admin/transaksi');
  }
}
