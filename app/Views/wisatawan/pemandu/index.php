<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3">
  <div class="row">

    <div class="col-lg-12">
      <div class="card p-3 py-3 bg-custom-2 text-center border-radius-10">
        <div class="text-start">
          <a class="text-3 h3" href="<?= base_url() . '/' . session()->get('current_url') ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <img src="<?= base_url('/assets/img/pemandu/' . $pemandu['image']) ?>" alt="" class="rounded-circle" height="100px">
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

    <div class="col-lg-12 mt-3">
      <div class="card p-3 bg-custom-2 border-radius-10 shadow-custom-2">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h4 class="text-white my-3">Dokumentasi</h4>
          </div>

        </div>

        <div class="row">
          <?php foreach ($dataKegiatan as $kegiatan) : ?>
            <div class="col-lg-4 text-center mt-3">
              <div class=" card border-0 border-radius-10 p-4">
                <div style="height: 200px; overflow: hidden;">
                  <img src="<?= base_url('/assets/img/pemandu/kegiatan/' . $kegiatan['image']) ?>" alt="" class="img-fluid">
                </div>
                <div>
                  <p class="mt-3" style="min-height: 48px;">
                    <?= substr($kegiatan['deskripsi'], 0, 50) . '....' ?>
                  </p>
                </div>


              </div>
            </div>
          <?php endforeach ?>


        </div>
      </div>
    </div>


  </div>
</div>
<?= $this->endSection() ?>