<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table = 'mahasiswa';
  protected $primaryKey = 'idmahasiswa';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nim',
    'nama',
    'jk',
    'kode_fakultas',
    'kode_prodi',
    'nip_pembimbing1',
    'nip_pembimbing2',
    'tanggal_lahir',
  ];
}
