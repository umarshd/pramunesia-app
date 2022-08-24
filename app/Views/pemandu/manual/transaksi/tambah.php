<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card p-3 border-radius-10 shadow-custom-2">
        <div class="row">
          <div class="col-6">
            <h5>Tambah Jadwal Memandu</h5>
          </div>
          <div class="col-6 text-end">
            <a href="<?= base_url() ?>/pemandu/jadwal" class="btn btn-primary btn-sm">kembali</a>
          </div>
        </div>
        <?php if (session()->get('error')) : ?>
          <div class="alert alert-danger my-2" role="alert">
            <?= session()->get('error') ?>
          </div>
        <?php endif ?>
        <form action="<?= base_url() ?>/pemandu/manual/transaksi/tambah/proses" method="post">
          <div class="form-group py-2">
            <label class="form-label">Nama</label>
            <input type="text" name="nama_wisatawan" class="form-control">
          </div>
          <div class="form-group py-2">
            <label class="form-label">Nomer Telepon</label>
            <input type="text" name="telepon_wisatawan" class="form-control">
          </div>
          <div class="form-group py-2">
            <label class="form-label">Tanggal Keberangkatan</label>
            <input type="date" class="form-control" name="tanggal_keberangkatan" id="txtDate">

          </div>
          <div class="form-group py-2">
            <label class="form-label">Tanggal Berakhir</label>
            <input type="date" class="form-control" name="tanggal_berakhir" id="txtDate2">

          </div>
          <div class="form-group py-2">
            <label class="form-label">Kota</label>
            <select name="kota_id" class="form-select">
              <option disabled selected>Pilih kota tujuan</option>
              <?php foreach ($dataKota as $kota) : ?>
                <option value="<?= $kota['id'] ?>"><?= $kota['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group py-2 text-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>