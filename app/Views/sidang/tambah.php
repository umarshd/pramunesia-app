<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tambah Sidang</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Sidang</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah</h5>
            <?php if (session()->get('error')) : ?>
              <div class="alert alert-danger" role="alert">
                <div><?= session('error') ?></div>
              </div>
            <?php endif ?>
            <form action="<?= base_url('admin/sidang/tambah/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group py-2">
                <label class="py-1 mb-2">Nomor Bukti</label>
                <select name="nomor_bukti" class="form-control">
                  <option disabled selected>Pilih Nomor Bukti</option>
                  <?php foreach ($pendaftarans as $pendaftaran) : ?>
                    <option value="<?= $pendaftaran['nomor_bukti'] ?>"><?= $pendaftaran['nomor_bukti'] ?></option>
                  <?php endforeach ?>
                  <option value=""></option>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Tanggal</label>
                <input type="date" class="form-control" name="tanggal_sidang">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIP Penguji 1</label>
                <select name="nip_penguji1" class="form-control">
                  <option selected disabled>Pilih Dosen Penguji 1</option>
                  <?php foreach ($dosens as $dosen) : ?>
                    <option value="<?= $dosen['nip'] ?>"><?= $dosen['nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIP Penguji 2</label>
                <select name="nip_penguji2" class="form-control">
                  <option selected disabled>Pilih Dosen Penguji 2</option>
                  <?php foreach ($dosens as $dosen) : ?>
                    <option value="<?= $dosen['nip'] ?>"><?= $dosen['nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Jenis Kelamin</label>
                <select name="status_sidang" class="form-control">
                  <option disabled selected>Pilih status sidang</option>
                  <option value="sudah sidang">Sudah Sidang</option>
                  <option value="belum sidang">Belum Sidang</option>
                </select>
              </div>
              <div class="text-end mt-2">
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>