<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\SidangModel;
use App\Models\PendaftaranSidangModel;

class Sidang extends BaseController
{
  protected $DosenModel;
  protected $SidangModel;
  protected $PendaftaranSidangModel;

  public function __construct()
  {
    $this->DosenModel = new DosenModel();
    $this->SidangModel = new SidangModel();
    $this->PendaftaranSidangModel = new PendaftaranSidangModel();
  }

  public function listSidang()
  {
    $data = [
      'sidangs' => $this->SidangModel->findAll(),
    ];
    return view('sidang/index', $data);
  }

  public function tambah()
  {
    $data = [
      'dosens' => $this->DosenModel->findAll(),
      'pendaftarans' => $this->PendaftaranSidangModel->findAll(),
    ];
    return view('sidang/tambah', $data);
  }

  public function edit($id)
  {
    $data = [
      'sidang' => $this->SidangModel->where('idsidang', $id)->first(),
      'dosens' => $this->DosenModel->findAll(),
    ];
    return view('sidang/edit', $data);
  }

  public function delete($id)
  {
    $this->SidangModel->delete($id);

    return redirect()->to('admin/sidang');
  }

  public function prosesTambah()
  {
    $rules = $this->validate([
      'nomor_bukti' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nomer bukti harus di isi'
        ]
      ],
      'tanggal_sidang' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'tanggal sidang harus di isi'
        ]
      ],
      'nip_penguji1' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip penguji 1 harus di isi'
        ]
      ],
      'nip_penguji2' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip penguji 2 harus di isi'
        ]
      ],
      'status_sidang' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'status sidang harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'nomor_bukti'     => $this->request->getVar('nomor_bukti'),
      'tanggal_sidang'    => $this->request->getVar('tanggal_sidang'),
      'nip_penguji1'      => $this->request->getVar('nip_penguji1'),
      'nip_penguji2'   => $this->request->getVar('nip_penguji2'),
      'status_sidang'  => $this->request->getVar('status_sidang'),
    ];

    $this->SidangModel->insert($data);
    return redirect()->to('/admin/sidang');
  }

  public function prosesEdit()
  {
    $rules = $this->validate([
      'nomor_bukti' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nomor bukti harus di isi'
        ]
      ],
      'tanggal_sidang' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'tanggal sidang harus di isi'
        ]
      ],
      'nip_penguji1' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip penguji 1 harus di isi'
        ]
      ],
      'nip_penguji2' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip penguji 2 harus di isi'
        ]
      ],
      'status_sidang' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'status sidang harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $id = $this->request->getVar('idsidang');

    $data = [
      'nomor_bukti'     => $this->request->getVar('nomor_bukti'),
      'tanggal_sidang'    => $this->request->getVar('tanggal_sidang'),
      'nip_penguji1'      => $this->request->getVar('nip_penguji1'),
      'nip_penguji2'   => $this->request->getVar('nip_penguji2'),
      'status_sidang'  => $this->request->getVar('status_sidang'),
    ];

    $this->SidangModel->update($id, $data);
    return redirect()->to('/admin/sidang');
  }
}
