<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Dosen extends BaseController
{
  protected $DosenModel;

  public function __construct()
  {
    $this->DosenModel = new DosenModel();
  }

  public function listDosen()
  {
    $data = [
      'dosens' => $this->DosenModel->findAll(),
    ];
    return view('dosen/index', $data);
  }

  public function tambah()
  {
    return view('dosen/tambah');
  }

  public function edit($nip)
  {
    $data = [
      'dosen' => $this->DosenModel->where('nip', $nip)->first()
    ];
    return view('dosen/edit', $data);
  }

  public function delete($nip)
  {
    $this->DosenModel->delete($nip);

    return redirect()->to('admin/dosen');
  }

  public function prosesTambah()
  {
    $rules = $this->validate([
      'nip' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip harus di isi'
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nama harus di isi'
        ]
      ],
      'jk' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'jk harus di isi'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'email harus di isi'
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'alamat harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'nip'     => $this->request->getVar('nip'),
      'nama'    => $this->request->getVar('nama'),
      'jk'      => $this->request->getVar('jk'),
      'email'   => $this->request->getVar('email'),
      'alamat'  => $this->request->getVar('alamat'),
    ];

    $this->DosenModel->insert($data);
    return redirect()->to('/admin/dosen');
  }

  public function prosesEdit()
  {
    $rules = $this->validate([
      'nip' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip harus di isi'
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nama harus di isi'
        ]
      ],
      'jk' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'jk harus di isi'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'email harus di isi'
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'alamat harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $nip = $this->request->getVar('nip');

    $data = [
      'nama'    => $this->request->getVar('nama'),
      'jk'      => $this->request->getVar('jk'),
      'email'   => $this->request->getVar('email'),
      'alamat'  => $this->request->getVar('alamat'),
    ];

    $this->DosenModel->update($nip, $data);
    return redirect()->to('/admin/dosen');
  }
}
