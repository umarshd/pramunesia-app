<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3">
  <div class="row">

    <div class="col-lg-12">
      <div class="card p-3 py-5 bg-custom-2 text-center">
        <div class="d-flex align-items-center justify-content-center">
          <img src="<?= base_url('/assets/img/pemandu/' . $pemandu['image']) ?>" alt="">
        </div>
        <h4 class="text-center py-2 pt-4 text-white">
          <?= $pemandu['nama'] ?> <span class="fw-light"> <?= $pemandu['email'] ?></span>
        </h4>
        <h6 class="text-center text-white">Harga : 300.000/Hari</h6>
        <p class="text-center text-white"> <?= $pemandu['telepon'] ?></p>
        <p class="text-center text-white">
          <?= $pemandu['alamat'] ?>
        </p>
      </div>
    </div>


  </div>
</div>
<?= $this->endSection() ?>