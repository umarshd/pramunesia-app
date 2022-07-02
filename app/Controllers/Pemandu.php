<?php

namespace App\Controllers;

use App\Models\PemanduModel;
use App\Models\CustomModel;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class Pemandu extends BaseController
{
  protected $PemanduModel;
  protected $CustomModel;

  public function __construct()
  {
    $this->PemanduModel = new PemanduModel();
    $this->CustomModel = new CustomModel();
  }

  public function index()
  {
    $data = [
      'jadwalMemandu' => $this->CustomModel->jadwalMemanduTerbaru(session()->get('pemandu_id'))
    ];
    return view('pemandu/index', $data);
  }

  public function profile()
  {
    $data = [
      'pemandu' => $this->PemanduModel->where('id', session()->get('pemandu_id'))->first()
    ];

    return view('pemandu/profile/index');
  }

  public function editProfile($id = null)
  {
    $data = [
      'pemandu'  => $this->PemanduModel->where('id', $id)->first()
    ];

    return view('pemandu/profile/edit');
  }

  public function kegiatan()
  {
    return view('pemandu/kegiatan/index');
  }
}
