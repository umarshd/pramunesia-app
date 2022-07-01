<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tambah Dosen</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Dosen</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah</h5>
            <form action="<?= base_url('admin/dosen/tambah/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIP</label>
                <input type="text" class="form-control" name="nip">
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
                <label class="py-1 mb-2">Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Alamat</label>
                <input type="text" class="form-control" name="alamat">
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