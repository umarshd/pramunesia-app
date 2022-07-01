<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Sidang</h1>
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
            <h5 class="card-title">Edit</h5>
            <?php if (session()->get('error')) : ?>
              <div class="alert alert-danger" role="alert">
                <div><?= session('error') ?></div>
              </div>
            <?php endif ?>
            <form action="<?= base_url('admin/sidang/edit/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group py-2">
                <label class="py-1 mb-2">Nomer Bukti</label>
                <input type="text" class="form-control" name="idsidang" value="<?= $sidang['idsidang'] ?>" hidden>
                <input type="text" class="form-control" name="nomor_bukti" value="<?= $sidang['nomor_bukti'] ?>" hidden>
                <input type="text" class="form-control" name="nomor_bukti1" value="<?= $sidang['nomor_bukti'] ?>" disabled>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Tanggal</label>
                <input type="date" class="form-control" name="tanggal_sidang" value="<?= $sidang['tanggal_sidang'] ?>">
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIP Penguji 1</label>
                <select name="nip_penguji1" class="form-control">
                  <option selected disabled>Pilih Dosen Penguji 1</option>
                  <?php foreach ($dosens as $dosen) : ?>
                    <?php if ($dosen['nip'] == $sidang['nip_penguji1']) : ?>
                      <option value="<?= $dosen['nip'] ?>" selected><?= $dosen['nama'] ?></option>
                    <?php endif ?>
                    <option value="<?= $dosen['nip'] ?>"><?= $dosen['nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">NIP Penguji 2</label>
                <select name="nip_penguji2" class="form-control">
                  <option selected disabled>Pilih Dosen Penguji 2</option>
                  <?php foreach ($dosens as $dosen) : ?>
                    <?php if ($dosen['nip'] == $sidang['nip_penguji2']) : ?>
                      <option value="<?= $dosen['nip'] ?>" selected><?= $dosen['nama'] ?></option>
                    <?php endif ?>
                    <option value="<?= $dosen['nip'] ?>"><?= $dosen['nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="py-1 mb-2">Jenis Kelamin</label>
                <select name="status_sidang" class="form-control">
                  <option disabled selected>Pilih status sidang</option>
                  <?php if ($sidang['status_sidang'] == 'sudah sidang') : ?>
                    <option value="sudah sidang" selected>Sudah Sidang</option>
                  <?php elseif ($sidang['status_sidang'] == 'belum sidang') : ?>
                    <option value="belum sidang" selected>Belum Sidang</option>
                  <?php endif ?>
                  <option value="sudah sidang">Sudah Sidang</option>
                  <option value="belum sidang">Belum Sidang</option>
                </select>
              </div>
              <div class="text-end mt-2">
                <button class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>