<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
  protected $table = 'dosen';
  protected $primaryKey = 'nip';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nip',
    'nama',
    'jk',
    'email',
    'alamat'
  ];
}
