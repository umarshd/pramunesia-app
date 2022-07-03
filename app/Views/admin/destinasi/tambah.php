<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">



  <div class="pagetitle">
    <h1>Destinasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Destinasi</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card p-3">
          <h5 class="fw-bold text-2">Tambah Destinasi</h5>
          <?php if (session()->get('error')) : ?>
            <div class="alert alert-danger my-2" role="alert">
              <?= session()->get('error') ?>
            </div>
          <?php endif ?>
          <form action="<?= base_url() ?>/admin/destinasi/tambah/proses" method="post" enctype="multipart/form-data">
            <div class="form-group py-2">
              <label class="form-label">Nama Destinasi</label>
              <input type="text" name="nama" class="form-control" value="<?= old('nama') ?>">
            </div>
            <div class="form-group py-2">
              <label class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" value="<?= old('alamat') ?>">
            </div>
            <div class="form-group py-2">
              <label class="form-label">Image</label>
              <input type="file" name="file" class="form-control" accept="image/*">
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <label class="form-label">Rekomendasi</label>
                  <select name="rekomendasi" class="form-select">
                    <option disabled selected>Pilih Status</option>
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <label class="form-label">Kota</label>
                  <select name="kota_id" class="form-select">
                    <option disabled selected>Pilih Kota</option>
                    <?php foreach ($dataKota as $kota) : ?>
                      <option value="<?= $kota['id'] ?>"><?= $kota['nama'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="py-3 text-end">
              <button class="btn btn-custom-3" type="submit">Kirim</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>