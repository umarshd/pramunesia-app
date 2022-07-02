<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
  public function ambilJadwalPemanduYangTersedia($tanggal_keberangkatan, $taanggal_berakhir)
  {
    $dbJadwal = $this->db->table('transaksi');

    $dbJadwal->where('tanggal_keberangkatan <', $tanggal_keberangkatan);
    $dbJadwal->where('tanggal_berakhir <', $tanggal_keberangkatan);
    $dbJadwal->where('tanggal_berakhir <', $taanggal_berakhir);

    return $dbJadwal->get()->getResultArray();
  }

  public function jadwalMemanduTerbaru($id)
  {
    $dbJadwal = $this->db->table('transaksi');

    $dbJadwal->where('pemandu_id', $id);
    $dbJadwal->limit(5);

    return $dbJadwal->get()->getResultArray();
  }

  public function dataPesananByIdWisatawan($id)
  {
    $dbTransaksi  = $this->db->table('transaksi');

    $dbTransaksi->where('wisatawan_id', $id);
    $dbTransaksi->join('kota', 'kota.id=transaksi.kota_id')->select('transaksi.*, kota.nama as nama_kota');
    $dbTransaksi->join('pemandu', 'pemandu.id=transaksi.pemandu_id')->select('pemandu.nama as nama_pemandu');

    return $dbTransaksi->get()->getResultArray();
  }
}
