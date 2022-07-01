<?= $this->extend('layouts/mahasiswa_layout') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Daftar Sidang</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Mahasiswa</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Daftar</h5>
            <?php if (session()->get('error')) : ?>
              <div class="alert alert-danger" role="alert">
                <div><?= session('error') ?></div>
              </div>
            <?php endif ?>
            <form action="<?= base_url('/mahasiswa/pendaftaransidang/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group py-2">
                <label class="py-1 mb-2">Tanggal</label>
                <input type="date" class="form-control" name="tanggal">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Tema Skripsi</label>
                <input type="text" class="form-control" name="tema_skripsi">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Judul Skripsi</label>
                <input type="text" class="form-control" name="judul_skripsi">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIM</label>
                <input type="text" class="form-control" name="nim" value="<?= $user['nim'] ?>" hidden>
                <input type="text" class="form-control" name="nim1" value="<?= $user['nim'] ?>" disabled>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Nama</label>
                <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $user['nama'] ?>" hidden>
                <input type="text" class="form-control" name="nama1" value="<?= $user['nama'] ?>" disabled>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Nama Pembimbing 1</label>
                <input type="text" class="form-control" name="nama_pembimbing1" value="<?= $nama_pembimbing1['nama'] ?>" hidden>
                <input type="text" class="form-control" name="nama_pembimbing11" value="<?= $nama_pembimbing1['nama'] ?>" disabled>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Nama Pembimbing 2</label>
                <input type="text" class="form-control" name="nama_pembimbing2" value="<?= $nama_pembimbing2['nama'] ?>" hidden>
                <input type="text" class="form-control" name="nama_pembimbing22" value="<?= $nama_pembimbing2['nama'] ?>" disabled>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">File Laporan</label>
                <input type="file" class="form-control" name="file_laporan">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">File Rekomendasi</label>
                <input type="file" class="form-control" name="file_rekomendasi">
              </div>
              <div class="text-end mt-2">
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-primary">Tambah</button>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>