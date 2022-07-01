<?php

namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
  protected $table = 'kota';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nama'
  ];
}
