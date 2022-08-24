<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\TransaksiModel;
use App\Models\CustomModel;
use App\Models\ManualTransaksiModel;
use App\Models\PemanduModel;
use App\Models\WisatawanModel;

class Transaksi extends BaseController
{
  protected $AdminModel;
  protected $TransaksiModel;
  protected $CustomModel;
  protected $PemanduModel;
  protected $WisatawanModel;
  protected $ManualTransaksiModel;

  public function __construct()
  {
    $this->AdminModel = new AdminModel();
    $this->TransaksiModel = new TransaksiModel();
    $this->CustomModel = new CustomModel();
    $this->PemanduModel = new PemanduModel();
    $this->WisatawanModel = new WisatawanModel();
    $this->ManualTransaksiModel = new ManualTransaksiModel();
  }

  public function index()
  {
    $data = [
      'dataTransaksi' => $this->CustomModel->dataTransaksi(),
      'dataTransaksiManual' => $this->ManualTransaksiModel
        ->join('kota', 'kota.id=manual_transaksi.kota_id')
        ->select('manual_transaksi.*, kota.nama as nama_kota')
        ->join('pemandu', 'pemandu.id=manual_transaksi.pemandu_id')
        ->select('pemandu.nama as nama_pemandu')
        ->orderBy('manual_transaksi.id', 'DESC')->findAll(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];

    return view('/admin/transaksi/index', $data);
  }

  public function edit($id = null)
  {
    $data = [
      'transaksi' => $this->CustomModel->dataTransaksiById($id)[0],
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

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

  public function delete($id)
  {
    $this->TransaksiModel->delete($id);
    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect()->to('/admin/transaksi');
  }

  public function indexManual()
  {
    $data = [
      'dataTransaksiManual' => $this->ManualTransaksiModeljoin
        ->join('kota', 'kota.id=manual_transaksi.kota_id')
        ->select('manual_transaksi.*, kota.nama as nama_kota')
        ->join('pemandu', 'pemandu.id=manual_transaksi.pemandu_id')
        ->select('pemandu.nama as nama_pemandu')
        ->orderBy('manual_transaksi.id', 'DESC')->findAll(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];

    return view('/admin/transaksi/index', $data);
  }

  public function editManual($id = null)
  {
    $data = [
      'transaksi' => $this->ManualTransaksiModel
        ->where('manual_transaksi.id', $id)
        ->join('kota', 'kota.id=manual_transaksi.kota_id')
        ->select('manual_transaksi.*, kota.nama as nama_kota')
        ->join('pemandu', 'pemandu.id=manual_transaksi.pemandu_id')
        ->select('pemandu.nama as nama_pemandu')->first(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];

    return view('admin/transaksi/edit_manual', $data);
  }

  public function prosesEditManual()
  {
    $rules = $this->validate([
      'nama_wisatawan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus di isi'
        ]
      ],
      'telepon_wisatawan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Telepon harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }


    $status = $this->request->getVar('status');

    $id = $this->request->getVar('id');

    $data = [
      'status' => $status,
      'nama_wisatawan' => $this->request->getVar('nama_wisatawan'),
      'telepon_wisatawan' => $this->request->getVar('telepon_wisatawan'),
    ];

    $this->ManualTransaksiModel->update($id, $data);
    session()->setFlashdata('successManual', 'Data berhasil diperbarui');
    return redirect()->to('/admin/transaksi');
  }

  public function deleteManual($id)
  {
    $this->ManualTransaksiModel->delete($id);
    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect()->to('/admin/transaksi');
  }
}
