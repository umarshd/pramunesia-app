<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\CustomModel;

class Mahasiswa extends BaseController
{
  protected $DosenModel;
  protected $MahasiswaModel;
  protected $CustomModel;

  public function __construct()
  {
    $this->DosenModel = new DosenModel();
    $this->MahasiswaModel = new MahasiswaModel();
    $this->CustomModel = new CustomModel();
  }

  public function dashboard()
  {
    $data = [
      'user' => $this->MahasiswaModel->where('nim', session()->get('nim_mahasiswa'))->first(),
      'dataSidang' => $this->CustomModel->getDataFromTBPendaftaranJoinSidang(),
    ];

    return view('mahasiswa/dashboard', $data);
  }

  public function listMahasiswa()
  {
    $data = [
      'mahasiswas' => $this->MahasiswaModel->findAll(),
    ];
    return view('mahasiswa/index', $data);
  }

  public function tambah()
  {
    $data = [
      'dosens' => $this->DosenModel->findAll(),
    ];
    return view('mahasiswa/tambah', $data);
  }

  public function edit($id)
  {
    $data = [
      'mahasiswa' => $this->MahasiswaModel->where('idmahasiswa', $id)->first(),
      'dosens'    => $this->DosenModel->findAll()
    ];
    return view('mahasiswa/edit', $data);
  }

  public function delete($id)
  {
    $this->MahasiswaModel->delete($id);

    return redirect()->to('admin/mahasiswa');
  }

  public function prosesTambah()
  {
    $rules = $this->validate([
      'nim' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nim harus di isi'
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
      'kode_fakultas' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'kode fakultas harus di isi'
        ]
      ],
      'kode_prodi' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'kode prodi harus di isi'
        ]
      ],
      'nip_pembimbing1' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip pembimbing 1 harus di isi'
        ]
      ],
      'nip_pembimbing2' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip pembimbing 2 harus di isi'
        ]
      ],
      'tanggal_lahir' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'tanggal lahir harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'nim'               => $this->request->getVar('nim'),
      'nama'              => $this->request->getVar('nama'),
      'jk'                => $this->request->getVar('jk'),
      'kode_fakultas'     => $this->request->getVar('kode_fakultas'),
      'kode_prodi'        => $this->request->getVar('kode_prodi'),
      'nip_pembimbing1'   => $this->request->getVar('nip_pembimbing1'),
      'nip_pembimbing2'   => $this->request->getVar('nip_pembimbing2'),
      'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
    ];

    $this->MahasiswaModel->insert($data);
    return redirect()->to('/admin/mahasiswa');
  }

  public function prosesEdit()
  {
    $rules = $this->validate([
      'nim' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nim harus di isi'
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
      'kode_fakultas' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'kode fakultas harus di isi'
        ]
      ],
      'kode_prodi' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'kode prodi harus di isi'
        ]
      ],
      'nip_pembimbing1' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip pembimbing 1 harus di isi'
        ]
      ],
      'nip_pembimbing2' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nip pembimbing 2 harus di isi'
        ]
      ],
      'tanggal_lahir' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'tanggal lahir harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $id = $this->request->getVar('idmahasiswa');

    $data = [
      'nim'               => $this->request->getVar('nim'),
      'nama'              => $this->request->getVar('nama'),
      'jk'                => $this->request->getVar('jk'),
      'kode_fakultas'     => $this->request->getVar('kode_fakultas'),
      'kode_prodi'        => $this->request->getVar('kode_prodi'),
      'nip_pembimbing1'   => $this->request->getVar('nip_pembimbing1'),
      'nip_pembimbing2'   => $this->request->getVar('nip_pembimbing2'),
      'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
    ];

    $this->MahasiswaModel->update($id, $data);
    return redirect()->to('/admin/mahasiswa');
  }
}
