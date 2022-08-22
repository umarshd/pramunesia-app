<?php

namespace App\Controllers;

use App\Models\WisatawanModel;
use App\Models\PemanduModel;
use App\Models\AdminModel;

class Auth extends BaseController
{
  protected $WisatawanModel;
  protected $PemanduModel;
  protected $AdminModel;

  public function __construct()
  {
    $this->WisatawanModel = new WisatawanModel();
    $this->PemanduModel = new PemanduModel();
    $this->AdminModel = new AdminModel();
  }

  public function loginWisatawan()
  {
    if (session()->get('is_login_wisatawan')) {
      return redirect()->to('/wisatawan');
    } elseif (session()->get('is_login_pemandu')) {
      return redirect()->to('/pemandu');
    } elseif (session()->get('is_login_admin')) {
      return view('/admin/dashboard');
    }

    return view('auth/login-wisatawan');
  }
  public function registrasiWisatawan()
  {
    return view('auth/regis-wisatawan');
  }

  public function prosesLoginWisatawan()
  {
    $rules = $this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi'
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

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $cekEmail = $this->WisatawanModel->where('email', $email)->first();

    if (!$cekEmail) {
      session()->setFlashdata('error', 'email atau password salah');
      return redirect()->back()->withInput();
    }

    $passwordVerif = password_verify($password, $cekEmail['password']);

    if (!$passwordVerif) {
      session()->setFlashdata('error', 'email atau password salah');
      return redirect()->back()->withInput();
    }

    session()->set([
      'is_login_wisatawan' => true,
      'wisatawan_id' => $cekEmail['id']
    ]);

    return redirect()->to('/wisatawan');
  }

  public function prosesRegistrasiWisatawan()
  {
    $rules = $this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus diisi'
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[wisatawan.email]',
        'errors' => [
          'required' => 'Email harus diisi',
          'is_unique' => 'Email sudah digunakan'
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
    session()->setFlashdata('success', 'Berhasil registrasi');
    return redirect()->to('/wisatawan/login');
  }

  public function logoutWisatawan()
  {
    session()->destroy();
    return redirect()->to('wisatawan/login');
  }

  public function loginPemandu()
  {
    if (session()->get('is_login_wisatawan')) {
      return redirect()->to('/wisatawan');
    } elseif (session()->get('is_login_pemandu')) {
      return redirect()->to('/pemandu');
    } elseif (session()->get('is_login_admin')) {
      return view('/admin/dashboard');
    }
    return view('auth/login-pemandu');
  }

  public function registrasiPemandu()
  {
    return view('auth/regis-pemandu');
  }

  public function prosesLoginPemandu()
  {
    $rules = $this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi'
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

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $cekEmail = $this->PemanduModel->where('email', $email)->first();

    if (!$cekEmail) {
      session()->setFlashdata('error', 'email atau password salah');
      return redirect()->back()->withInput();
    }

    $passwordVerif = password_verify($password, $cekEmail['password']);

    if (!$passwordVerif) {
      session()->setFlashdata('error', 'email atau password salah');
      return redirect()->back()->withInput();
    }

    session()->set([
      'is_login_pemandu' => true,
      'pemandu_id' => $cekEmail['id']
    ]);

    return redirect()->to('/pemandu');
  }

  public function prosesRegistrasiPemandu()
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
        'rules' => 'required|is_unique[pemandu.email]',
        'errors' => [
          'required' => 'Email harus diisi',
          'is_unique' => 'Email sudah digunakan'
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
    session()->setFlashdata('success', 'Berhasil registrasi');
    return redirect()->to('/pemandu/login');
  }

  public function logoutPemandu()
  {
    session()->destroy();
    return redirect()->to('/pemandu/login');
  }

  public function loginAdmin()
  {
    if (session()->get('is_login_wisatawan')) {
      return redirect()->to('/wisatawan');
    } elseif (session()->get('is_login_pemandu')) {
      return redirect()->to('/pemandu');
    } elseif (session()->get('is_login_admin')) {
      return view('/admin/dashboard');
    }
    return view('auth/login-admin');
  }

  public function prosesLoginAdmin()
  {
    $rules = $this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi'
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

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $cekEmail = $this->AdminModel->where('email', $email)->first();

    if (!$cekEmail) {
      session()->setFlashdata('error', 'email atau password salah');
      return redirect()->back()->withInput();
    }

    $passwordVerif = password_verify($password, $cekEmail['password']);

    if (!$passwordVerif) {
      session()->setFlashdata('error', 'email atau password salah');
      return redirect()->back()->withInput();
    }



    session()->set([
      'is_login_admin' => true,
      'admin_id' => $cekEmail['id']
    ]);

    return redirect()->to('/admin/dashboard');
  }

  public function logoutAdmin()
  {
    session()->destroy();
    return redirect()->to('/admin/login');
  }
}
