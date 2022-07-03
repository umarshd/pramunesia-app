<?php

namespace App\Models;

use CodeIgniter\Model;

class PemanduModel extends Model
{
  protected $table = 'pemandu';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'noKta',
    'nama',
    'email',
    'telepon',
    'password',
    'image',
    'alamat',
    'jenis',
    'ringkasan',
  ];
}
