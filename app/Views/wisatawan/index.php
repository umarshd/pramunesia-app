<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3">
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
    <?php if ($dataTransaksi) : ?>
      <div class="col-lg-12 mt-3">
        <h3>Data Pemandu</h3>
        <div class="row">
          <?php foreach ($dataPemandu as $pemandu) : ?>
            <div class="col-lg-6 mt-3">
              <div class="card p-4 bg-custom-2">
                <div class="row">
                  <div class="col-lg-3">
                    <img src="<?= base_url('/assets/img/pemandu/' . $pemandu['image']) ?>" alt="" class="img-fluid">
                  </div>
                  <div class="col-lg-9">
                    <h5 class="text-white"><?= $pemandu['nama'] ?></h5>
                    <a href="<?= base_url('/wisatawan/pemandu/' . $pemandu['id']) ?>" class="btn btn-secondary">Detail</a>
                    <form action="" method="post">
                      <input type="text" name="kota_id" value="<?= $kota_id ?>">
                      <input type="text" name="tanggal_berakhir" value="<?= $tanggal_berakhir ?>">
                      <input type="text" name="tanggal_keberangkatan" value="<?= $tanggal_keberangkatan   ?>">
                    </form>
                    <a href="<?= base_url() ?>/" class="btn btn-custom-3">Pesan</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    <?php endif ?>

  </div>
</div>
<?= $this->endSection() ?>