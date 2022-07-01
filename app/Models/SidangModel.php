<?php

namespace App\Models;

use CodeIgniter\Model;

class SidangModel extends Model
{
  protected $table = 'sidang';
  protected $primaryKey = 'idsidang';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nomor_bukti',
    'tanggal_sidang',
    'nip_penguji1',
    'nip_penguji2',
    'status_sidang'
  ];
}
