<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'iduser';
  protected $returnType = 'array';
  protected $allowedFields = [
    'username',
    'password',
    'rolename',
    'nim_mahasiswa'
  ];
}
