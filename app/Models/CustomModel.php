<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
  public function getDataFromTBPendaftaranJoinSidang()
  {
    $dbSidang = $this->db->table('sidang');
    $dbSidang->join('pendaftaran', 'pendaftaran.nomor_bukti=sidang.nomor_bukti')->select('pendaftaran.*, sidang.tanggal_sidang, sidang.nip_penguji1, sidang.nip_penguji2, sidang.status_sidang ');
    return $dbSidang->get()->getResultArray();
  }

  public function getDataSidangSaya($nim)
  {
    $dbPendaftaran = $this->db->table('pendaftaran');
    $dbPendaftaran->where('nim', $nim);
    return $dbPendaftaran->get()->getResultArray();
  }
}
