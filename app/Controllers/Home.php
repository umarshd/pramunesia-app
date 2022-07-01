<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    return view('admin/kota/tambah');
  }

  public function prosestambah()
  {
    $rules = $this->validate([
      'nama' => 'required'
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'nama' => $this->request->getVar('nama')
    ];
  }
}
