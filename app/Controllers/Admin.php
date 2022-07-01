<?php

namespace App\Controllers;

use App\Models\CustomModel;
use App\Models\DosenModel;

class Admin extends BaseController
{
  protected $CustomModel;
  protected $DosenModel;

  public function __construct()
  {
    $this->CustomModel = new CustomModel();
    $this->DosenModel = new DosenModel();
  }
  public function dashboard()
  {
    $data = [
      'dataSidang' => $this->CustomModel->getDataFromTBPendaftaranJoinSidang(),
      'dosens' => $this->DosenModel->findAll(),
    ];

    return view('admin/dashboard', $data);
  }
}
