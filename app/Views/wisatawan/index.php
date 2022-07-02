<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row">
    <div class="col-lg-12">
      <div class="card p-3 bg-custom-2 border-radius-10">
        <form action="" method="get">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group py-2">
                <label class="form-label text-white">Kota Tujuan</label>
                <select name="kota_id" class="form-select">
                  <option selected disabled>Pilih Kota Tujuan</option>
                  <?php $datakotaArray[] = $kota_id ?>
                  <?php foreach ($dataKota as $kota) : ?>
                    <?php if (in_array($kota['id'], $datakotaArray)) : ?>
                      <option selected value="<?= $kota['id'] ?>"><?= $kota['nama'] ?></option>
                    <?php else : ?>
                      <option value="<?= $kota['id'] ?>"><?= $kota['nama'] ?></option>
                    <?php endif ?>
                  <?php endforeach ?>

                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group py-2">
                <label class="form-label text-white">Tanggal Keberangkatan</label>
                <input type="date" value="<?= $tanggal_keberangkatan ?>" class="form-control" name="tanggal_keberangkatan" id="txtDate">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group py-2">
                <label class="form-label text-white">Tanggal Berakhir</label>
                <input type="date" value="<?= $tanggal_berakhir ?>" class="form-control" name="tanggal_berakhir" id="txtDate2">
              </div>
            </div>
          </div>
          <div class="text-end py-2">
            <button type="submit" class="btn btn-custom-3">Cari Pemandu</button>
          </div>
        </form>
      </div>
    </div>
    <?php if ($kota_id &&  $tanggal_berakhir  && $tanggal_keberangkatan) : ?>
      <div class="col-lg-12 mt-3">
        <h3>Data Pemandu</h3>
        <div class="row">
          <?php $handleDisplayKosong = '' ?>
          <?php foreach ($dataPemandu as $pemandu) : ?>
            <?php if (in_array($pemandu['id'], $dataTransaksi)) : ?>
              <?php $handleDisplayKosong = 'Pemandu tidak tersedia' ?>
            <?php else : ?>
              <div class="col-lg-6 mt-3" style="min-height: 216px !important;">
                <div class="card p-4 bg-custom-2 border-radius-10" style="height: 100%;">
                  <div class="row align-items-center">
                    <div class="col-lg-3">
                      <img src="<?= base_url('/assets/img/pemandu/' . $pemandu['image']) ?>" alt="" class="rounded-circle" height="100px">
                    </div>
                    <div class="col-lg-9">
                      <div class="d-flex flex-column justify-content-between" style="height: 100% ;">
                        <h5 class="text-white mb-3"><?= $pemandu['nama'] ?></h5>
                        <p class="text-white displayRingkasan " style="min-height: 72px ;"><?= substr($pemandu['ringkasan'], 0, 100) ?></p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                          <span class="text-white">Rp.300.000,00 / hari</span>
                          <a href="<?= base_url('/wisatawan/pemandu/' . $pemandu['id']) ?>" class="btn btn-secondary ms-auto">Detail</a>
                          <?php
                          date_default_timezone_set('Asia/Jakarta');
                          $tanggal_pemesanan = date('Y-m-d');
                          ?>
                          <a href="<?= base_url('/wisatawan/transaksi/konfirmasi?kota_id=' . $kota_id . '&tanggal_keberangkatan=' . $tanggal_keberangkatan . '&tanggal_berakhir=' . $tanggal_berakhir . '&tanggal_pemesanan=' . $tanggal_pemesanan . '&pemandu_id=' . $pemandu['id']) ?>" class="btn btn-custom-3 mx-2">Pesan</a>

                        </div>
                      </div>

                      <!-- <form action="" method="post">
                        <input type="text" name="kota_id" value="<?= $kota_id ?>" hidden>
                        <input type="text" name="tanggal_berakhir" value="<?= $tanggal_berakhir ?>" hidden>
                        <input type="text" name="tanggal_keberangkatan" value="<?= $tanggal_keberangkatan   ?>" hidden>
                      </form> -->
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>

          <?php endforeach ?>

        </div>
      </div>
    <?php endif ?>

  </div>
</div>
<?= $this->endSection() ?>