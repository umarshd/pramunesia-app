<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="mb-4 text-center mt-3">Selamat Datang, Pemandu Wisata!</h2>
      <div class="d-flex justify-content-center">
        <img src="<?= base_url() ?>/assets/images/heropic.png" class="img-fluid" height="50%">
      </div>
    </div>
  </div>
  <div class="col-lg-12 my-2">
    <h3 class="h3 pt-4 text-center p-3">Pilih Sesuai Kebutuhanmu</h3>
    <div class="row">
      <div class="col-lg-4">
        <div class="card p-3 border-radius-10 bg-custom-2">
          <div class="row align-items-center">
            <div class="col-lg-4">
              <i class="fas fa-calendar text-white" style="font-size: 80px;"></i>
            </div>
            <div class="col-lg-8">
              <h5 class="card-title text-white">Jadwal Bertugas</h5>
              <small class="card-text text-white">
                Lihat jadwal bertugasmu!
              </small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card p-3 border-radius-10 bg-custom-2">
          <div class="row  align-items-center">
            <div class="col-lg-4">
              <i class="fas fa-copy text-white" style="font-size: 80px ;"></i>
            </div>
            <div class="col-lg-8">
              <h5 class="card-title text-white">Surat Tugas</h5>
              <small class="card-text text-white">
                Ajukan surat tugasmu!
              </small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card p-3 border-radius-10 bg-custom-2">
          <div class="row  align-items-center">
            <div class="col-lg-4">
              <i class="fas fa-envelope-open-text text-white" style="font-size: 80px;"></i>
            </div>
            <div class="col-lg-8">
              <h5 class="card-title text-white">
                Surat Rekomendasi
              </h5>
              <small class="card-text text-white">
                rekomendasi sertifikasimu!
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="col-lg-12 my-5">
    <div class="card p-3 border-radius-10">
      <div class="row">
        <div class="col-lg-6">
          <h5>Jadwal Memandu</h5>
        </div>
        <div class="col-lg-6 text-end">
          <a href="<?= base_url() ?>/admin/kota/tambah" class="btn btn-primary btn-sm">Tambah Kota</a>
        </div>
      </div>
      <?php if (session()->get('success')) : ?>
        <div class="alert alert-success my-2" role="alert">
          <?= session()->get('success') ?>
        </div>
      <?php endif ?>
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>

          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($jadwalMemandu as $jadwal) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $jadwal['tanggal_berangkat'] ?></td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
      <!-- End Table with stripped rows -->


    </div>
  </div>
</div>
<?= $this->endSection() ?>