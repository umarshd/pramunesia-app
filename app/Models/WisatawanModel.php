<?php

namespace App\Models;

use CodeIgniter\Model;

class WisatawanModel extends Model
{
  protected $table = 'wisatawan';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nama',
    'email',
    'telepon',
    'password',
    'image'
  ];
}
