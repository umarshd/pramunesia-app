<?php

namespace App\Controllers;

use App\Models\WisatawanModel;
use App\Models\KotaModel;
use App\Models\DestinasiModel;
use App\Models\CustomModel;
use App\Models\TransaksiModel;
use App\Models\PemanduModel;

class Wisatawan extends BaseController
{
  protected $WisatawanModel;
  protected $KotaModel;
  protected $DestinasiModel;
  protected $CustomModel;
  protected $TransaksiModel;
  protected $PemanduModel;

  public function __construct()
  {
    $this->WisatawanModel = new WisatawanModel();
    $this->KotaModel = new KotaModel();
    $this->DestinasiModel = new DestinasiModel();
    $this->CustomModel = new CustomModel();
    $this->TransaksiModel = new TransaksiModel();
    $this->PemanduModel = new PemanduModel();
  }

  public function index()
  {
    $kota_id = $this->request->getVar('kota_id');
    $tanggal_keberangkatan = $this->request->getVar('tanggal_keberangkatan');
    $tanggal_berakhir = $this->request->getVar('tanggal_berakhir');

    $dbTransaksi = $this->TransaksiModel->findAll();

    $dataTransaksi = [];

    foreach ($dbTransaksi as $transaksi) {
      if ($tanggal_keberangkatan >= $transaksi['tanggal_keberangkatan'] && $tanggal_keberangkatan <= $transaksi['tanggal_berakhir'] || $tanggal_berakhir >= $transaksi['tanggal_keberangkatan'] && $tanggal_berakhir <= $transaksi['tanggal_berakhir']) {
        $dataTransaksi[] = $transaksi['pemandu_id'];
      }
    }


    if (!$kota_id && $tanggal_keberangkatan && $tanggal_berakhir) {
      $data = [
        'dataKota' => $this->KotaModel->findAll(),
        'dataDestinasi' => $this->DestinasiModel,
        'dataTransaksi' => null,
        'tanggal_keberangkatan' => "",
        'kota_id' => '',
        'tanggal_berakhir' => ''
      ];

      return view('wisatawan/index', $data);
    }

    $data = [
      'dataKota' => $this->KotaModel->findAll(),
      'dataDestinasi' => $this->DestinasiModel,
      'dataTransaksi' => $dataTransaksi,
      'dataPemandu' => $this->PemanduModel->findAll(),
      'tanggal_keberangkatan' => $tanggal_keberangkatan,
      'kota_id' => $kota_id,
      'tanggal_berakhir' => $tanggal_berakhir
    ];
    return view('wisatawan/index', $data);
  }

  public function detailPemandu($id = null)
  {
    $data = [
      'pemandu' => $this->PemanduModel->where('id', $id)->first()
    ];
    return view('wisatawan/pemandu/index', $data);
  }
}
