<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranSidangModel extends Model
{
  protected $table = 'pendaftaran';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nomor_bukti',
    'tanggal',
    'judul_skripsi',
    'nim',
    'nama_mahasiswa',
    'nama_pembimbing1',
    'nama_pembimbing2',
    'file_laporan',
    'file_rekomendasi',
    'tema_skripsi'
  ];
}
