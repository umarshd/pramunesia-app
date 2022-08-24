<?php

namespace App\Controllers;

use App\Models\PemanduModel;
use App\Models\CustomModel;
use App\Models\KegiatanModel;
use App\Models\KotaModel;
use App\Models\ManualTransaksiModel;

class Pemandu extends BaseController
{
  protected $PemanduModel;
  protected $CustomModel;
  protected $KegiatanModel;
  protected $KotaModel;
  protected $ManualTransaksiModel;

  public function __construct()
  {
    $this->PemanduModel = new PemanduModel();
    $this->CustomModel = new CustomModel();
    $this->KegiatanModel = new KegiatanModel();
    $this->KotaModel = new KotaModel();
    $this->ManualTransaksiModel = new ManualTransaksiModel();
  }

  public function index()
  {
    $data = [
      'dataTransaksi' => $this->CustomModel->jadwalMemanduTerbaru(session()->get('pemandu_id')),
    ];
    return view('pemandu/index', $data);
  }

  public function profile()
  {
    $data = [
      'pemandu' => $this->PemanduModel->where('id', session()->get('pemandu_id'))->first()
    ];

    return view('pemandu/profile/index', $data);
  }

  public function editProfile($id = null)
  {
    $data = [
      'pemandu'  => $this->PemanduModel->where('id', $id)->first()
    ];


    return view('pemandu/profile/edit', $data);
  }

  public function prosesEditProfile()
  {
    $rules = $this->validate([
      'noKta' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomer Kta harus diisi'
        ]
      ],
      'ringkasan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Ringkasan harus diisi'
        ]
      ],
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
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat harus diisi'
        ]
      ],
      'jenis' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis harus diisi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }



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
            'noKta' => $this->request->getVar('noKta'),
            'nama' => $this->request->getVar('nama'),
            'telepon' => $this->request->getVar('telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis' => $this->request->getVar('jenis'),
            'ringkasan' => $this->request->getVar('ringkasan'),
          ];

          $this->PemanduModel->update($id, $data);
          session()->setFlashdata('success', 'Data berhasil di perbarui');
          return redirect()->to('/pemandu/profile');
        }

        if ($password != $passwordVerif) {
          session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
          return redirect()->back()->withInput();
        }

        $passwordHas = password_hash($password, PASSWORD_BCRYPT);

        $data = [
          'noKta' => $this->request->getVar('noKta'),
          'nama' => $this->request->getVar('nama'),
          'telepon' => $this->request->getVar('telepon'),
          'alamat' => $this->request->getVar('alamat'),
          'jenis' => $this->request->getVar('jenis'),
          'ringkasan' => $this->request->getVar('ringkasan'),
          'password' => $passwordHas,
        ];

        $this->PemanduModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/pemandu/profile');
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
        $image->move('assets/img/pemandu/', $newNameImage);

        $data = [
          'noKta' => $this->request->getVar('noKta'),
          'nama' => $this->request->getVar('nama'),
          'telepon' => $this->request->getVar('telepon'),
          'alamat' => $this->request->getVar('alamat'),
          'jenis' => $this->request->getVar('jenis'),
          'ringkasan' => $this->request->getVar('ringkasan'),
          'image' => $newNameImage
        ];

        $this->PemanduModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/pemandu/profile');
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
      $image->move('assets/img/pemandu/', $newNameImage);

      $data = [
        'noKta' => $this->request->getVar('noKta'),
        'nama' => $this->request->getVar('nama'),
        'telepon' => $this->request->getVar('telepon'),
        'alamat' => $this->request->getVar('alamat'),
        'jenis' => $this->request->getVar('jenis'),
        'ringkasan' => $this->request->getVar('ringkasan'),
        'password' => $passwordHas,
        'image' => $newNameImage
      ];

      $this->PemanduModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/pemandu/profile');
    }

    $rulesEmail = $this->validate([
      'email' => [
        'rules' => 'required|is_unique[pemandu.email]',
        'errors' => [
          'required' => 'Email harus diisi',
          'is_unique' => 'Email sudah digunakan'
        ]
      ],
    ]);

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
          'noKta' => $this->request->getVar('noKta'),
          'nama' => $this->request->getVar('nama'),
          'email' => $email,
          'telepon' => $this->request->getVar('telepon'),
          'alamat' => $this->request->getVar('alamat'),
          'jenis' => $this->request->getVar('jenis'),
          'ringkasan' => $this->request->getVar('ringkasan'),
        ];

        $this->PemanduModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil di perbarui');
        return redirect()->to('/pemandu/profile');
      }

      if ($password != $passwordVerif) {
        session()->setFlashdata('error', 'Password konfirmasi tidak sama dengan password');
        return redirect()->back()->withInput();
      }

      $passwordHas = password_hash($password, PASSWORD_BCRYPT);

      $data = [
        'noKta' => $this->request->getVar('noKta'),
        'nama' => $this->request->getVar('nama'),
        'email' => $email,
        'telepon' => $this->request->getVar('telepon'),
        'alamat' => $this->request->getVar('alamat'),
        'jenis' => $this->request->getVar('jenis'),
        'ringkasan' => $this->request->getVar('ringkasan'),
        'password' => $passwordHas,
      ];

      $this->PemanduModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/pemandu/profile');
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
      $image->move('assets/img/pemandu/', $newNameImage);

      $data = [
        'noKta' => $this->request->getVar('noKta'),
        'nama' => $this->request->getVar('nama'),
        'email' => $email,
        'telepon' => $this->request->getVar('telepon'),
        'alamat' => $this->request->getVar('alamat'),
        'jenis' => $this->request->getVar('jenis'),
        'ringkasan' => $this->request->getVar('ringkasan'),
        'image' => $newNameImage
      ];

      $this->PemanduModel->update($id, $data);
      session()->setFlashdata('success', 'Data berhasil di perbarui');
      return redirect()->to('/pemandu/profile');
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
    $image->move('assets/img/pemandu/', $newNameImage);

    $data = [
      'noKta' => $this->request->getVar('noKta'),
      'nama' => $this->request->getVar('nama'),
      'email' => $email,
      'telepon' => $this->request->getVar('telepon'),
      'alamat' => $this->request->getVar('alamat'),
      'jenis' => $this->request->getVar('jenis'),
      'ringkasan' => $this->request->getVar('ringkasan'),
      'password' => $passwordHas,
      'image' => $newNameImage
    ];

    $this->PemanduModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil di perbarui');
    return redirect()->to('/pemandu/profile');
  }

  public function kegiatan()
  {
    $data = [
      'dataKegiatan' => $this->CustomModel->dataKegiatanByIdPemandu(session()->get('pemandu_id'))
    ];
    return view('pemandu/kegiatan/index', $data);
  }

  public function jadwal()
  {
    $data = [
      'dataTransaksi' => $this->CustomModel->jadwalMemandu(session()->get('pemandu_id')),
      'dataManualTransaksi' => $this->ManualTransaksiModel
        ->where('pemandu_id', session()->get('pemandu_id'))
        ->join('pemandu', 'pemandu.id=manual_transaksi.pemandu_id')
        ->select('manual_transaksi.*, pemandu.nama as nama_pemandu')
        ->orderBy('manual_transaksi.id', 'DESC')->findAll()
    ];

    return view('pemandu/jadwal/index', $data);
  }

  public function tambahKegiatan()
  {
    return view('pemandu/kegiatan/tambah');
  }

  public function prosesTambahKegiatan()
  {
    $rules = $this->validate([
      'deskripsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi harus di isi'
        ]
      ],
      'file' => [
        'uploaded[file]',
        'mime_in[file,image/png,image/jpg,image/jpeg]',
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    date_default_timezone_set('Asia/Jakarta');
    $image = $this->request->getFile('file');

    $file = $image->getName();
    $info = pathinfo($file);

    $file_name =  $info['filename'];
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name));
    $newNameImage = $slug . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . $image->getClientExtension();
    $image->move('assets/img/pemandu/kegiatan/', $newNameImage);

    $data = [
      'pemandu_id' => $this->request->getVar('pemandu_id'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'image' => $newNameImage,

    ];

    $this->KegiatanModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('/pemandu/kegiatan');
  }

  public function deleteKegiatan($id = null)
  {
    $this->KegiatanModel->delete($id);
    session()->setFlashdata('suceess', 'Data berhasil dihapus');
    return redirect()->to('/pemandu/kegiatan');
  }

  public function tambahManualTransaksi()
  {
    $data = [
      'pemandu' => $this->PemanduModel->where('id', session()->get('pemandu_id'))->first(),
      'dataKota' => $this->KotaModel->findAll()
    ];

    return view('pemandu/manual/transaksi/tambah', $data);
  }

  public function prosesTambahManualTransaksi()
  {
    $rules = $this->validate([
      'nama_wisatawan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus di isi'
        ]
      ],
      'telepon_wisatawan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Telepon harus di isi'
        ]
      ],
      'tanggal_keberangkatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal keberangkatan harus di isi'
        ]
      ],
      'tanggal_berakhir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal berakhir harus di isi'
        ]
      ],
      'kota_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kota harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    date_default_timezone_set('Asia/Jakarta');
    $nomorTiket = date('YmdHis') . session()->get('pemandu_id');

    $data = [
      'kota_id' => $this->request->getVar('kota_id'),
      'nomor_tiket' => $nomorTiket,
      'tanggal_pemesanan' => date('Y-m-d'),
      'tanggal_keberangkatan' => $this->request->getVar('tanggal_keberangkatan'),
      'tanggal_berakhir' => $this->request->getVar('tanggal_berakhir'),
      'pemandu_id' => session()->get('pemandu_id'),
      'status' => 'belum dibayar',
      'nama_wisatawan' => $this->request->getVar('nama_wisatawan'),
      'telepon_wisatawan' => $this->request->getVar('telepon_wisatawan'),
    ];

    $this->ManualTransaksiModel->insert($data);
    session()->setFlashdata('success', 'Data berhasil ditambahkan');
    return redirect()->to('/pemandu/jadwal');
  }
}
