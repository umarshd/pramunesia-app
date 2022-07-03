<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\TransaksiModel;
use App\Models\CustomModel;
use App\Models\PemanduModel;
use App\Models\WisatawanModel;

class Admin extends BaseController
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
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),
      'dataTransaksi' => $this->CustomModel->transaksiTerbaru(),
      'countPemandu' => $this->PemanduModel->countAllResults(),
      'countWisatawan' => $this->WisatawanModel->countAllResults(),
      'countTransaksi' => $this->TransaksiModel->countAllResults()
    ];
    return view('admin/index', $data);
  }

  public function indexWisatawan()
  {
    $data = [
      'dataWisatawan' => $this->WisatawanModel->findAll(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first()
    ];



    return view('admin/wisatawan/index', $data);
  }

  public function tambahWisatawan()
  {
    $data = [
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];
    return view('/admin/wisatawan/tambah', $data);
  }

  public function prosesTambahWisatawan()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus diisi'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi',
        ]
      ],
      'telepon' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomer Telepon harus diisi'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password harus diisi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    $password = $this->request->getVar('password');
    $passwordVerif = $this->request->getVar('passwordVerif');

    if ($password != $passwordVerif) {
      session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
      return redirect()->back()->withInput();
    }

    $passwordHas = password_hash($password, PASSWORD_BCRYPT);

    $data = [
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'telepon' => $this->request->getVar('telepon'),
      'password' => $passwordHas,
      'image' => 'default.png'
    ];

    $this->WisatawanModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('/admin/wisatawan');
  }

  public function editWisatawan($id = null)
  {
    $data = [
      'wisatawan' => $this->WisatawanModel->where('id', $id)->first(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),
    ];

    return view('admin/wisatawan/edit', $data);
  }

  public function prosesEditWisatawan()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus diisi'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi',
        ]
      ],
      'telepon' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomer Telepon harus diisi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }



    $id = $this->request->getVar('id');

    $password = $this->request->getVar('password');
    $passwordVerif = $this->request->getVar('passwordVerif');

    date_default_timezone_set('Asia/Jakarta');
    $image = $_FILES['file']['name'];




    if (!$image) {
      if (!$password) {
        $data = [
          'nama' => $this->request->getVar('nama'),
          'email' => $this->request->getVar('email'),
          'telepon' => $this->request->getVar('telepon'),
        ];

        $this->WisatawanModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/admin/wisatawan');
      }

      if ($password != $passwordVerif) {
        session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
        return redirect()->back()->withInput();
      }

      $passwordHas = password_hash($password, PASSWORD_BCRYPT);

      $data = [
        'nama' => $this->request->getVar('nama'),
        'email' => $this->request->getVar('email'),
        'telepon' => $this->request->getVar('telepon'),
        'password' => $passwordHas,
      ];

      $this->WisatawanModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/admin/wisatawan');
    }

    $image = $this->request->getFile('file');
    $rulesImage = $this->validate([
      'file' => [
        'uploaded[file]',
        'mime_in[file,image/png,image/jpg,image/jpeg]',
      ],
    ]);

    if (!$rulesImage) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    if (!$password) {
      $file = $image->getName();
      $info = pathinfo($file);

      $file_name =  $info['filename'];
      $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
      $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
      $image->move('assets/img/wisatawan/', $newNameImage);

      $data = [
        'nama' => $this->request->getVar('nama'),
        'email' => $this->request->getVar('email'),
        'telepon' => $this->request->getVar('telepon'),
        'image' => $newNameImage
      ];

      $this->WisatawanModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/admin/wisatawan');
    }


    if ($password != $passwordVerif) {
      session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
      return redirect()->back()->withInput();
    }

    $passwordHas = password_hash($password, PASSWORD_BCRYPT);

    $file = $image->getName();
    $info = pathinfo($file);

    $file_name =  $info['filename'];
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
    $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
    $image->move('assets/img/wisatawan/', $newNameImage);

    $data = [
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'telepon' => $this->request->getVar('telepon'),
      'password' => $passwordHas,
      'image' => $newNameImage
    ];

    $this->WisatawanModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil di perbarui');
    return redirect()->to('/admin/wisatawan');
  }

  public function indexPemandu()
  {
    $data = [
      'dataPemandu' => $this->PemanduModel->findAll(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];

    return view('admin/pemandu/index', $data);
  }

  public function tambahPemandu()
  {
    $data = [
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),
    ];
    return view('/admin/pemandu/tambah', $data);
  }

  public function prosesTambahPemandu()
  {
    $rules = $this->validate([
      'noKta' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomer Kta harus diisi'
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus diisi'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi',
        ]
      ],
      'telepon' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomer Telepon harus diisi'
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat harus diisi'
        ]
      ],
      'jenis' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'jenis akun harus diisi'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password harus diisi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    $password = $this->request->getVar('password');
    $passwordVerif = $this->request->getVar('passwordVerif');

    if ($password != $passwordVerif) {
      session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
      return redirect()->back()->withInput();
    }

    $passwordHas = password_hash($password, PASSWORD_BCRYPT);

    $data = [
      'noKta' => $this->request->getVar('noKta'),
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'telepon' => $this->request->getVar('telepon'),
      'alamat' => $this->request->getVar('alamat'),
      'jenis' => $this->request->getVar('jenis'),
      'password' => $passwordHas,
      'image' => 'default.png'
    ];

    $this->PemanduModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('/admin/pemandu');
  }

  public function editPemandu($id = null)
  {
    $data = [
      'pemandu' => $this->PemanduModel->where('id', $id)->first(),
      'admin' => $this->AdminModel->where('id', session()->get('admin_id'))->first(),

    ];

    return view('admin/pemandu/edit', $data);
  }

  public function prosesEditPemandu()
  {
    $rules = $this->validate([
      'noKta' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomer Kta harus diisi'
        ]
      ],
      'ringkasan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Ringkasan harus diisi'
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus diisi'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi',
        ]
      ],
      'telepon' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomer Telepon harus diisi'
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat harus diisi'
        ]
      ],
      'jenis' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis harus diisi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }



    $id = $this->request->getVar('id');

    $password = $this->request->getVar('password');
    $passwordVerif = $this->request->getVar('passwordVerif');

    date_default_timezone_set('Asia/Jakarta');
    $image = $_FILES['file']['name'];




    if (!$image) {
      if (!$password) {
        $data = [
          'noKta' => $this->request->getVar('noKta'),
          'nama' => $this->request->getVar('nama'),
          'email' => $this->request->getVar('email'),
          'telepon' => $this->request->getVar('telepon'),
          'alamat' => $this->request->getVar('alamat'),
          'jenis' => $this->request->getVar('jenis'),
          'ringkasan' => $this->request->getVar('ringkasan'),
        ];

        $this->PemanduModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/admin/pemandu');
      }

      if ($password != $passwordVerif) {
        session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
        return redirect()->back()->withInput();
      }

      $passwordHas = password_hash($password, PASSWORD_BCRYPT);

      $data = [
        'noKta' => $this->request->getVar('noKta'),
        'nama' => $this->request->getVar('nama'),
        'email' => $this->request->getVar('email'),
        'telepon' => $this->request->getVar('telepon'),
        'alamat' => $this->request->getVar('alamat'),
        'jenis' => $this->request->getVar('jenis'),
        'ringkasan' => $this->request->getVar('ringkasan'),
        'password' => $passwordHas,
      ];

      $this->PemanduModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/admin/pemandu');
    }

    $image = $this->request->getFile('file');
    $rulesImage = $this->validate([
      'file' => [
        'uploaded[file]',
        'mime_in[file,image/png,image/jpg,image/jpeg]',
      ],
    ]);

    if (!$rulesImage) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    if (!$password) {
      $file = $image->getName();
      $info = pathinfo($file);

      $file_name =  $info['filename'];
      $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
      $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
      $image->move('assets/img/pemandu/', $newNameImage);

      $data = [
        'noKta' => $this->request->getVar('noKta'),
        'nama' => $this->request->getVar('nama'),
        'email' => $this->request->getVar('email'),
        'telepon' => $this->request->getVar('telepon'),
        'alamat' => $this->request->getVar('alamat'),
        'jenis' => $this->request->getVar('jenis'),
        'ringkasan' => $this->request->getVar('ringkasan'),
        'image' => $newNameImage
      ];

      $this->PemanduModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/admin/pemandu');
    }


    if ($password != $passwordVerif) {
      session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
      return redirect()->back()->withInput();
    }

    $passwordHas = password_hash($password, PASSWORD_BCRYPT);

    $file = $image->getName();
    $info = pathinfo($file);

    $file_name =  $info['filename'];
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
    $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
    $image->move('assets/img/pemandu/', $newNameImage);

    $data = [
      'noKta' => $this->request->getVar('noKta'),
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'telepon' => $this->request->getVar('telepon'),
      'alamat' => $this->request->getVar('alamat'),
      'jenis' => $this->request->getVar('jenis'),
      'ringkasan' => $this->request->getVar('ringkasan'),
      'password' => $passwordHas,
      'image' => $newNameImage
    ];

    $this->PemanduModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil di perbarui');
    return redirect()->to('/admin/pemandu');
  }

  public function deleteWisatawan($id = null)
  {
    $this->WisatawanModel->delete($id);
    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect()->to('/admin/wisatawan');
  }

  public function deletePemandu($id = null)
  {
    $this->PemanduModel->delete($id);
    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect()->to('/admin/pemandu');
  }
}
