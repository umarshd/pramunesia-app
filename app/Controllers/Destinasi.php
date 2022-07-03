<?php

namespace App\Controllers;

use App\Models\KotaModel;
use App\Models\DestinasiModel;
use App\Models\CustomModel;
use App\Models\AdminModel;

class Destinasi extends BaseController
{
  protected $KotaModel;
  protected $DestinasiModel;
  protected $CustomModel;
  protected $AdminModel;

  public function __construct()
  {
    $this->KotaModel = new KotaModel();
    $this->DestinasiModel = new DestinasiModel();
    $this->CustomModel = new CustomModel();
    $this->AdminModel = new AdminModel();
  }

  public function index()
  {
    $data = [
      'dataDestinasi' => $this->CustomModel->dataDestinasi(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];
    return view('admin/destinasi/index', $data);
  }

  public function tambah()
  {
    $data = [
      'dataKota' => $this->KotaModel->findAll(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];
    return view('admin/destinasi/tambah', $data);
  }

  public function edit($id = null)
  {
    $data = [
      'dataKota' => $this->KotaModel->findAll(),
      'destinasi' => $this->DestinasiModel->where('id', $id)->first(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];



    return view('admin/destinasi/edit', $data);
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
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat harus diisi'
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
      'alamat' => $this->request->getVar('alamat'),
      'rekomendasi' => $this->request->getVar('rekomendasi'),
      'kota_id' => $this->request->getVar('kota_id'),
      'image' => $newNameImage,
    ];

    $this->DestinasiModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('admin/destinasi');
  }

  public function prosesEdit()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Destinasi harus diisi'
        ]
      ],
      'alamat' => [
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
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $rulesImage = $this->validate([
      'file' => [
        'uploaded[file]',
        'mime_in[file,image/png,image/jpg,image/jpeg]',
      ],
    ]);

    $id = $this->request->getVar('id');

    date_default_timezone_set('Asia/Jakarta');
    $image = $_FILES['file']['name'];


    if (!$image) {
      $data = [
        'nama' => $this->request->getVar('nama'),
        'alamat' => $this->request->getVar('alamat'),
        'rekomendasi' => $this->request->getVar('rekomendasi'),
        'kota_id' => $this->request->getVar('kota_id'),

      ];

      $this->DestinasiModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil diperbarui');
      return redirect()->to('admin/destinasi');
    }
    $image = $this->request->getFile('file');
    if (!$rulesImage) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $file = $image->getName();
    $info = pathinfo($file);

    $file_name =  $info['filename'];
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
    $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
    $image->move('assets/img/destinasi/', $newNameImage);

    $data = [
      'nama' => $this->request->getVar('nama'),
      'alamat' => $this->request->getVar('alamat'),
      'rekomendasi' => $this->request->getVar('rekomendasi'),
      'kota_id' => $this->request->getVar('kota_id'),
      'image' => $newNameImage,
    ];

    $this->DestinasiModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil diperbarui');
    return redirect()->to('admin/destinasi');
  }

  public function delete($id = null)
  {
    $this->DestinasiModel->delete($id);
    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect()->to('admin/destinasi');
  }
}
