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
    return view('auth/login-wisatawan');
  }

  public function loginPemandu()
  {
    return view('auth/login-pemandu');
  }

  public function loginAdmin()
  {
    return view('auth/login-admin');
  }

  public function prosesLoginWisatawan()
  {
    $rules = $this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email tidak boleh kosong'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'password tidak boleh kosong'
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
      session()->setFlashdata('error', 'Email atau Password salah');
      return redirect()->back()->withInput();
    }

    $passwordVerify = password_verify($password, $cekEmail['password']);

    if (!$passwordVerify) {
      session()->setFlashdata('error', 'Email atau Password salah');
      return redirect()->back()->withInput();
    }

    session()->set([
      'wisatawanId' => $cekEmail['id'],
    ]);


    return redirect()->to('/wisatawan/kota');
  }

  public function prosesLoginPemandu()
  {
    $rules = $this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email tidak boleh kosong'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'password tidak boleh kosong'
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
      session()->setFlashdata('error', 'Email atau Password salah');
      return redirect()->back()->withInput();
    }

    $passwordVerify = password_verify($password, $cekEmail['password']);

    if (!$passwordVerify) {
      session()->setFlashdata('error', 'Email atau Password salah');
      return redirect()->back()->withInput();
    }

    session()->set([
      'pemanduId' => $cekEmail['id'],
    ]);


    return redirect()->to('/pemandu/dashboard');
  }

  public function prosesLoginAdmin()
  {
    $rules = $this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email tidak boleh kosong'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'password tidak boleh kosong'
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
      session()->setFlashdata('error', 'Email atau Password salah');
      return redirect()->back()->withInput();
    }

    $passwordVerify = password_verify($password, $cekEmail['password']);

    if (!$passwordVerify) {
      session()->setFlashdata('error', 'Email atau Password salah');
      return redirect()->back()->withInput();
    }

    session()->set([
      'adminId' => $cekEmail['id'],
    ]);


    return redirect()->to('/admin/dashboard');
  }
}
