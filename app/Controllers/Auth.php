<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\UsersModel;

class Auth extends BaseController
{
  protected $MahasiswaModel;
  protected $UsersModel;

  public function __construct()
  {
    $this->MahasiswaModel = new MahasiswaModel();
    $this->UsersModel = new UsersModel();
  }
  public function login()
  {
    return view('auth/login');
  }
  public function register()
  {
    return view('auth/register');
  }

  public function prosesLogin()
  {
    $rules = $this->validate([
      'username' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'Username harus di isi'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'Password harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    $chekUsername = $this->UsersModel->where('username', $username)->first();
    if (!$chekUsername) {
      session()->setFlashdata('error', 'username tidak terdaftar');
      return redirect()->back();
    }

    $passwordVerify = password_verify($password, $chekUsername['password']);

    if ($passwordVerify != $password) {
      session()->setFlashdata('error', 'password salah');
      return redirect()->back();
    }

    session()->set([
      'username'      => $chekUsername['username'],
      'rolename'      => $chekUsername['rolename'],
      'nim_mahasiswa' => $chekUsername['nim_mahasiswa'],
      'is_loggin'     => true,
    ]);

    if ($chekUsername['rolename'] == 'mahasiswa') {
      return redirect()->to('/mahasiswa/dashboard');
    }
    return redirect()->to('/admin/dashboard');
  }

  public function prosesRegister()
  {
    $rules = $this->validate([
      'nim' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'Nim harus di isi'
        ]
      ],
      'username' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'Username harus di isi'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'Password harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $nimInput = $this->request->getVar('nim');

    $dataMahasiswa = $this->MahasiswaModel->findAll();

    $dataNimMahasiswa = [];

    foreach ($dataMahasiswa as $dataMhs) {
      $dataNimMahasiswa[] = $dataMhs['nim'];
    }

    if (!in_array($nimInput, $dataNimMahasiswa)) {
      session()->setFlashdata('error', 'nim tidak terdaftar');
      return redirect()->back();
    }

    $password = $this->request->getVar('password');
    $passwordKonfirmasi = $this->request->getVar('password2');

    if ($password != $passwordKonfirmasi) {
      session()->setFlashdata('error', 'password tidak sama ! silahkan cek kembali');
      return redirect()->back();
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $data = [
      'username'  => $this->request->getVar('username'),
      'password'  => $passwordHash,
      'rolename'  => 'mahasiswa',
      'nim_mahasiswa' => $this->request->getVar('nim'),
    ];

    $this->UsersModel->insert($data);
    return redirect()->to('/');
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }
}
