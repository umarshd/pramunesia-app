<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tambah Mahasiswa</h1>
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
            <h5 class="card-title">Tambah</h5>
            <form action="<?= base_url('admin/mahasiswa/tambah/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIM</label>
                <input type="text" class="form-control" name="nim">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Nama</label>
                <input type="text" class="form-control" name="nama">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Jenis Kelamin</label>
                <select name="jk" class="form-control">
                  <option disabled selected>Pilih Jenis Kelamin</option>
                  <option value="Laki - laki">Laki - laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Kode Fakultas</label>
                <input type="text" class="form-control" name="kode_fakultas">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Kode Prodi</label>
                <input type="text" class="form-control" name="kode_prodi">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIP Pembimbing 1</label>
                <select name="nip_pembimbing1" class="form-control">
                  <option selected disabled>Pilih Dosen Pembimbing 1</option>
                  <?php foreach ($dosens as $dosen) : ?>
                    <option value="<?= $dosen['nip'] ?>"><?= $dosen['nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIP Pembimbing 2</label>
                <select name="nip_pembimbing2" class="form-control">
                  <option selected disabled>Pilih Dosen Pembimbing 2</option>
                  <?php foreach ($dosens as $dosen) : ?>
                    <option value="<?= $dosen['nip'] ?>"><?= $dosen['nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group py-2">
                <label class="py-1 mb-2">Tanggal lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir">
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