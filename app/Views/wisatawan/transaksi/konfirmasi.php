<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3">
  <div class="row">
    <form action="" method="post">
      <div class="form-group py-2">
        <label class="form-label">Tanggal Pemesanan</label>
        <input type="text" name="tanggal_pemesanan" value="">
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>