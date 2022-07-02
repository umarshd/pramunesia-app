<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
  protected $table = 'transaksi';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'tanggal_pemesanan',
    'tanggal_keberangkatan',
    'tanggal_berakhir',
    'status',
    'kota_id',
    'pemandu_id',
    'wisatawan_id',
    'nomor_tiket'
  ];
}
