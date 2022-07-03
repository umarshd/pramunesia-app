<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinasiModel extends Model
{
  protected $table = 'destinasi';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nama',
    'rekomendasi',
    'kota_id',
    'image',
    'alamat'
  ];
}
