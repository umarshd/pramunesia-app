<?php

namespace App\Controllers;

use App\Models\WisatawanModel;

class Auth extends BaseController
{
  protected $WisatawanModel;

  public function __construct()
  {
    $this->WisatawanModel = new WisatawanModel();
  }

  public function loginWisatawan()
  {
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
          'required' => 'Email harus diisi',
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

    return 'lolos validasi';
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
    $passwordVerif = $this->request->getVar('passwordVerfif');

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
}
