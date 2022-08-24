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
        'dataTransaksi' => false,
        'tanggal_keberangkatan' => null,
        'kota_id' => null,
        'tanggal_berakhir' => null,
        'show' => false
      ];

      return view('wisatawan/index', $data);
    }

    if ($tanggal_keberangkatan > $tanggal_berakhir) {
      $data = [
        'dataKota' => $this->KotaModel->findAll(),
        'dataTransaksi' => false,
        'tanggal_keberangkatan' => null,
        'kota_id' => null,
        'tanggal_berakhir' => null,
        'dataPemandu' => null,
        'show' => false
      ];

      return view('wisatawan/index', $data);
    }

    $data = [
      'dataKota' => $this->KotaModel->findAll(),
      'dataTransaksi' => $dataTransaksi,
      'dataPemandu' => $this->PemanduModel->findAll(),
      'tanggal_keberangkatan' => $tanggal_keberangkatan,
      'kota_id' => $kota_id,
      'tanggal_berakhir' => $tanggal_berakhir,
      'show' => true,
      'dataDestinasi' => $this->CustomModel->dataDestinasiByIdKota($kota_id)
    ];

    session()->set(['current_url' => 'wisatawan?kota_id=' . $kota_id . '&tanggal_keberangkatan=' . $tanggal_keberangkatan . '&tanggal_berakhir=' . $tanggal_berakhir]);

    return view('wisatawan/index', $data);
  }

  public function detailPemandu($id = null)
  {
    $data = [
      'pemandu' => $this->PemanduModel->where('id', $id)->first(),
      'dataKegiatan' => $this->CustomModel->dataKegiatanByIdPemandu($id)
    ];
    return view('wisatawan/pemandu/index', $data);
  }

  public function profile()
  {
    $data = [
      'wisatawan' => $this->WisatawanModel->where('id', session()->get('wisatawan_id'))->first()
    ];
    return view('wisatawan/profile/index', $data);
  }

  public function editProfile()
  {
    $data = [
      'wisatawan' => $this->WisatawanModel->where('id', session()->get('wisatawan_id'))->first()
    ];
    return view('wisatawan/profile/edit', $data);
  }

  public function prosesEditProfile()
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
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    $rulesEmail = $this->validate([
      'email' => [
        'rules' => 'required|is_unique[wisatawan.email]',
        'errors' => [
          'required' => 'Email harus diisi',
          'is_unique' => 'Email sudah digunakan'
        ]
      ],
    ]);

    $email = $this->request->getVar('email');
    $emailOld = $this->request->getVar('emailOld');

    if ($email == $emailOld) {
      $id = $this->request->getVar('id');

      $password = $this->request->getVar('password');
      $passwordVerif = $this->request->getVar('passwordVerif');

      date_default_timezone_set('Asia/Jakarta');
      $image = $_FILES['file']['name'];




      if (!$image) {
        if (!$password) {
          $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
          ];

          $this->WisatawanModel->update($id, $data);
          session()->setFlashdata('success', 'Data berhasil di perbarui');
          return redirect()->to('/wisatawan/profile');
        }

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
        ];

        $this->WisatawanModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/wisatawan/profile');
      }

      $image = $this->request->getFile('file');
      $rulesImage = $this->validate([
        'file' => [
          'uploaded[file]',
          'mime_in[file,image/png,image/jpg,image/jpeg]',
        ],
      ]);

      if (!$rulesImage) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back();
      }

      if (!$password) {
        $file = $image->getName();
        $info = pathinfo($file);

        $file_name =  $info['filename'];
        $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
        $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
        $image->move('assets/img/wisatawan/', $newNameImage);

        $data = [
          'nama' => $this->request->getVar('nama'),
          'email' => $this->request->getVar('email'),
          'telepon' => $this->request->getVar('telepon'),
          'image' => $newNameImage
        ];

        $this->WisatawanModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/wisatawan/profile');
      }


      if ($password != $passwordVerif) {
        session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
        return redirect()->back()->withInput();
      }

      $passwordHas = password_hash($password, PASSWORD_BCRYPT);

      $file = $image->getName();
      $info = pathinfo($file);

      $file_name =  $info['filename'];
      $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
      $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
      $image->move('assets/img/wisatawan/', $newNameImage);

      $data = [
        'nama' => $this->request->getVar('nama'),
        'email' => $this->request->getVar('email'),
        'telepon' => $this->request->getVar('telepon'),
        'password' => $passwordHas,
        'image' => $newNameImage
      ];

      $this->WisatawanModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/wisatawan/profile');
    }

    if (!$rulesEmail) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }


    $id = $this->request->getVar('id');

    $password = $this->request->getVar('password');
    $passwordVerif = $this->request->getVar('passwordVerif');

    date_default_timezone_set('Asia/Jakarta');
    $image = $_FILES['file']['name'];




    if (!$image) {
      if (!$password) {
        $data = [
          'nama' => $this->request->getVar('nama'),
          'email' => $email,
          'telepon' => $this->request->getVar('telepon'),
        ];

        $this->WisatawanModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/wisatawan/profile');
      }

      if ($password != $passwordVerif) {
        session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
        return redirect()->back()->withInput();
      }

      $passwordHas = password_hash($password, PASSWORD_BCRYPT);

      $data = [
        'nama' => $this->request->getVar('nama'),
        'email' => $email,
        'telepon' => $this->request->getVar('telepon'),
        'password' => $passwordHas,
      ];

      $this->WisatawanModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/wisatawan/profile');
    }

    $image = $this->request->getFile('file');
    $rulesImage = $this->validate([
      'file' => [
        'uploaded[file]',
        'mime_in[file,image/png,image/jpg,image/jpeg]',
      ],
    ]);

    if (!$rulesImage) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    if (!$password) {
      $file = $image->getName();
      $info = pathinfo($file);

      $file_name =  $info['filename'];
      $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
      $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
      $image->move('assets/img/wisatawan/', $newNameImage);

      $data = [
        'nama' => $this->request->getVar('nama'),
        'email' => $email,
        'telepon' => $this->request->getVar('telepon'),
        'image' => $newNameImage
      ];

      $this->WisatawanModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/wisatawan/profile');
    }


    if ($password != $passwordVerif) {
      session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
      return redirect()->back()->withInput();
    }

    $passwordHas = password_hash($password, PASSWORD_BCRYPT);

    $file = $image->getName();
    $info = pathinfo($file);

    $file_name =  $info['filename'];
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
    $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
    $image->move('assets/img/wisatawan/', $newNameImage);

    $data = [
      'nama' => $this->request->getVar('nama'),
      'email' => $email,
      'telepon' => $this->request->getVar('telepon'),
      'password' => $passwordHas,
      'image' => $newNameImage
    ];

    $this->WisatawanModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil di perbarui');
    return redirect()->to('/wisatawan/profile');
  }



  public function konfirmasiPesanan()
  {
    $kota_id = $this->request->getVar('kota_id');
    $pemandu_id = $this->request->getVar('pemandu_id');
    $tanggal_keberangkatan = $this->request->getVar('tanggal_keberangkatan');
    $tanggal_berakhir = $this->request->getVar('tanggal_berakhir');
    $tanggal_pemesanan = $this->request->getVar('tanggal_pemesanan');

    $kota = $this->KotaModel->where('id', $kota_id)->first();
    $pemandu = $this->PemanduModel->where('id', $pemandu_id)->first();



    $data = [
      'kota' => $kota,
      'kota_id' => $kota_id,
      'pemandu' => $pemandu,
      'tanggal_keberangkatan' => $tanggal_keberangkatan,
      'tanggal_berakhir' => $tanggal_berakhir,
      'tanggal_pemesanan' => $tanggal_pemesanan,
    ];

    return view('wisatawan/transaksi/konfirmasi', $data);
  }

  public function setPesanan()
  {
    $rules = $this->validate([
      'kota_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kota harus ada'
        ]
      ],

      'tanggal_pemesanan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Pememsanan harus ada'
        ]
      ],
      'tanggal_keberangkatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal keberangkatan harus ada'
        ]
      ],
      'tanggal_berakhir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal berakhir harus ada'
        ]
      ],
      'pemandu_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Pemandu harus ada'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'kota_id' => $this->request->getVar('kota_id'),
      'nomor_tiket' => $this->request->getVar('nomor_tiket'),
      'tanggal_pemesanan' => $this->request->getVar('tanggal_pemesanan'),
      'tanggal_keberangkatan' => $this->request->getVar('tanggal_keberangkatan'),
      'tanggal_berakhir' => $this->request->getVar('tanggal_berakhir'),
      'pemandu_id' => $this->request->getVar('pemandu_id'),
      'status' => 'belum dibayar',
      'wisatawan_id' => session()->get('wisatawan_id'),
    ];

    $this->TransaksiModel->insert($data);
    session()->setFlashdata('success', 'Berhasil melakukan transaksi');
    return redirect()->to('/wisatawan/pemesanan');
  }

  public function pemesanan()
  {
    $data = [
      'dataPemesanan' => $this->CustomModel->dataPesananByIdWisatawan(session()->get('wisatawan_id'))
    ];
    return view('wisatawan/pemesanan/index', $data);
  }

  public function pembayaran($nomorTiket = null)
  {
    $data = [
      'tiket' => $this->CustomModel->dataTransaksiByNomorTiket($nomorTiket)[0]
    ];

    return view('wisatawan/pembayaran/index', $data);
  }

  public function tiketPemesanan($nomorTiket)
  {
    $data = [
      'tiket' => $this->CustomModel->dataTransaksiByNomorTiket($nomorTiket)[0]
    ];

    return view('wisatawan/pemesanan/tiket', $data);
  }

  public function cetakTiket($nomorTiket)
  {
    $data = [
      'tiket' => $this->CustomModel->dataTransaksiByNomorTiket($nomorTiket)[0]
    ];

    return view('wisatawan/pemesanan/cetak', $data);
  }
}
