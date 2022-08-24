<?php

namespace App\Models;

use CodeIgniter\Model;

class ManualTransaksiModel extends Model
{
  protected $table = 'manual_transaksi';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'tanggal_pemesanan',
    'tanggal_keberangkatan',
    'tanggal_berakhir',
    'status',
    'kota_id',
    'pemandu_id',
    'nama_wisatawan',
    'telepon_wisatawan',
    'nomor_tiket'
  ];
}
