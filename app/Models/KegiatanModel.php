<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
  protected $table = 'kegiatan';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'deskripsi',
    'image',
    'pemandu_id'
  ];
}
