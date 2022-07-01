<?php

namespace App\Controllers;

use App\Models\KotaModel;
use App\Models\DestinasiModel;

class Destinasi extends BaseController
{
  protected $KotaModel;
  protected $DestinasiModel;

  public function __construct()
  {
    $this->KotaModel = new KotaModel();
    $this->DestinasiModel = new DestinasiModel();
  }

  public function index()
  {
    $data = [
      'dataDestinasi' => $this->DestinasiModel->findAll()
    ];
    return view('admin/destinasi/index', $data);
  }

  public function tambah()
  {
    $data = [
      'dataKota' => $this->KotaModel->findAll()
    ];
    return view('admin/destinasi/tambah', $data);
  }

  public function prosestambah()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Destinasi harus diisi'
        ]
      ],
      'rekomendasi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Rekomendasi harus diisi'
        ]
      ],
      'kota_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Kota harus diisi'
        ]
      ],
      'file' => [
        'uploaded[file]',
        'mime_in[file,image/png,image/jpg,image/jpeg]',
      ],

    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    date_default_timezone_set('Asia/Jakarta');
    $image = $this->request->getFile('file');

    $file = $image->getName();
    $info = pathinfo($file);

    $file_name =  $info['filename'];
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
    $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
    $image->move('assets/img/destinasi/', $newNameImage);

    $data = [
      'nama' => $this->request->getVar('nama'),
      'rekomendasi' => $this->request->getVar('rekomendasi'),
      'kota_id' => $this->request->getVar('kota_id'),
      'image' => $newNameImage,
    ];

    $this->DestinasiModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('admin/destinasi');
  }
}
