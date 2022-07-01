<?php

namespace App\Controllers;

use App\Models\DestinasiModel;
use App\Models\KotaModel;

class Wisatawan extends BaseController
{
  protected $KotaModel;
  protected $DestinasiModel;
  public function __construct()
  {
    $this->KotaModel = new KotaModel();
    $this->DestinasiModel = new DestinasiModel();
  }

  public function pilihKota()
  {
    $data = [
      'dataKota' => $this->KotaModel->findAll(),
    ];

    return view('wisatawan/kota', $data);
  }

  public function destinasi()
  {
    $data = [];

    return view('wisatwan/destinasi');
  }

  public function cekJadwalPemandu()
  {
    $data = [];

    return view('wisatawan/jadwal-pemandu');
  }
}
