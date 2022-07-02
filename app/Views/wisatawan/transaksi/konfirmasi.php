<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card bg-custom-2 p-3 border-radius-10">
        <h5 class="text-white">Konfirmasi Pesanan</h5>
        <form action="<?= base_url() ?>/wisatawan/transaksi/konfirmasi/proses" method="post">
          <div class="form-group py-2">
            <label class="form-label text-white">Kota Tujuan</label>
            <div class="text-3">
              <?= $kota['nama'] ?>
            </div>
            <input type="text" name="kota_id" value="<?= $kota_id ?>" hidden>
          </div>
          <div class="form-group py-2">
            <label class="form-label text-white">Tanggal Pemesanan</label>
            <div class="text-3">
              <?= $tanggal_pemesanan ?>
            </div>
            <input type="text" name="tanggal_pemesanan" value="<?= $tanggal_pemesanan ?>" hidden>
            <?php

            date_default_timezone_set('Asia/Jakarta');
            $nomorTiket = date('YmdHis') . session()->get('wisatawan_id');

            ?>
            <input type="text" name="nomor_tiket" value="<?= $nomorTiket ?>" hidden>

          </div>
          <div class="form-group py-2">
            <label class="form-label text-white">Tanggal Keberangkatan</label>
            <div class="text-3">
              <?= $tanggal_keberangkatan ?>
            </div>
            <input type="text" name="tanggal_keberangkatan" value="<?= $tanggal_keberangkatan ?>" hidden>
          </div>
          <div class="form-group py-2">
            <label class="form-label text-white">Tanggal Berakhir</label>
            <div class="text-3">
              <?= $tanggal_berakhir ?>
            </div>
            <input type="text" name="tanggal_berakhir" value="<?= $tanggal_berakhir ?>" hidden>

          </div>
          <div class="form-group py-2">
            <label class="form-label text-white">Pemandu</label>
            <div class="text-3">
              <?= $pemandu['nama'] ?>
            </div>
            <input type="text" name="pemandu_id" value="<?= $pemandu['id'] ?>" hidden>

          </div>
          <div class="text-end py-3">
            <a href="<?= base_url('/wisatawan?kota_id=' . $kota_id . '&tanggal_keberangkatan=' . $tanggal_keberangkatan . '&tanggal_berakhir=' . $tanggal_berakhir) ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-custom-3">Konfirmasi</button>
          </div>
        </form>
      </div>
    </div>


  </div>
</div>
<?= $this->endSection() ?>