<?php

namespace App\Controllers;

use App\Models\CustomModel;
use App\Models\PendaftaranSidangModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;

class PendaftaranSidang extends BaseController
{
  protected $CustomModel;
  protected $PendaftaranSidangModel;
  protected $MahasiswaModel;
  protected $DosenModel;


  public function __construct()
  {
    $this->CustomModel = new CustomModel();
    $this->PendaftaranSidangModel = new PendaftaranSidangModel();
    $this->MahasiswaModel = new MahasiswaModel();
    $this->DosenModel = new DosenModel();
  }

  public function statusSidang()
  {
    $data = [
      'dataSidang' => $this->CustomModel->getDataSidangSaya(session()->get('nim_mahasiswa'))
    ];

    return view('pendaftaransidang/status', $data);
  }

  public function daftarSidang()
  {
    $cekUser = $this->MahasiswaModel->where('nim', session()->get('nim_mahasiswa'))->first();
    $data = [
      'user' => $this->MahasiswaModel->where('nim', session()->get('nim_mahasiswa'))->first(),
      'nama_pembimbing1' => $this->DosenModel->where('nip', $cekUser['nip_pembimbing1'])->first(),
      'nama_pembimbing2' => $this->DosenModel->where('nip', $cekUser['nip_pembimbing2'])->first(),
      'dosens' => $this->DosenModel->findAll(),
    ];
    return view('pendaftaransidang/tambah', $data);
  }

  public function prosesDaftar()
  {
    $rules = $this->validate([
      'tanggal' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'tanggal harus di isi'
        ]
      ],
      'judul_skripsi' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'Judul Skripsi harus di isi'
        ]
      ],
      'nama_mahasiswa' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'Nama Mahasiswa harus di isi'
        ]
      ],
      'nama_pembimbing1' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nama pembimbing 1 harus di isi'
        ]
      ],
      'nama_pembimbing2' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'nama pembimbing 2 harus di isi'
        ]
      ],
      'file_laporan' => [
        'rules' => 'uploaded[file_laporan]|mime_in[file_laporan,application/pdf]',
      ],
      'file_rekomendasi' => [
        'rules' => 'uploaded[file_rekomendasi]|mime_in[file_laporan,application/pdf]',
      ],
      'tema_skripsi' => [
        'rules' => 'required',
        'errors'  => [
          'required' => 'tema skripsi harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $namaFileLaporan = $this->request->getVar('nama_mahasiswa') . 'file_laporan.pdf';
    $namaFileRekomendasi = $this->request->getVar('nama_mahasiswa') . 'file_rekomendasi.pdf';
    $FileLaporan = $this->request->getFile('file_laporan');
    $FileRekomendasi = $this->request->getFile('file_rekomendasi');

    $FileLaporan->move('assets/documents/uploads/', $namaFileLaporan);
    $FileRekomendasi->move('assets/documents/uploads/', $namaFileRekomendasi);



    date_default_timezone_set('Asia/Jakarta');
    $nomer_buktti = date('y') . date('m') . date('d') . date('H') . date('i') . date('s');

    $data = [
      'nomor_bukti'       => $nomer_buktti,
      'tanggal'           => $this->request->getVar('tanggal'),
      'judul_skripsi'     => $this->request->getVar('judul_skripsi'),
      'nim'               => $this->request->getVar('nim'),
      'nama_mahasiswa'    => $this->request->getVar('nama_mahasiswa'),
      'nama_pembimbing1'  => $this->request->getVar('nama_pembimbing1'),
      'nama_pembimbing2'  => $this->request->getVar('nama_pembimbing2'),
      'file_laporan'      => $namaFileLaporan,
      'file_rekomendasi'  => $namaFileRekomendasi,
      'tema_skripsi'      => $this->request->getVar('tema_skripsi'),
    ];

    $this->PendaftaranSidangModel->insert($data);
    return redirect()->to('/mahasiswa/dashboard');
  }
}
