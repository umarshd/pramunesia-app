<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">



  <div class="pagetitle">
    <h1>Destinasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Destinasi</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center">

      <div class="col-lg-6">
        <div class="card p-3">

          <h5 class="text-2 fw-bold">Edit Destinasi</h5>


          <?php if (session()->get('error')) : ?>
            <div class="alert alert-danger my-2" role="alert">
              <?= session()->get('error') ?>
            </div>
          <?php endif ?>
          <form action="<?= base_url() ?>/admin/destinasi/edit/proses" method="post" enctype="multipart/form-data">
            <div class="form-group py-2">
              <label class="form-label">Nama Destinasi</label>
              <input type="text" name="id" class="form-control" value="<?= $destinasi['id'] ?>" hidden>
              <input type="text" name="nama" class="form-control" value="<?= $destinasi['nama'] ?>">
            </div>
            <div class="form-group py-2">
              <label class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" value="<?= $destinasi['alamat'] ?>">
            </div>
            <div class="form-group py-2">
              <label class="form-label">Image</label>
              <input type="file" name="file" class="form-control" accept="image/*">
            </div>
            <div class="form-group py-2">
              <label class="form-label">Rekomendasi</label>
              <?= $destinasi['rekomendasi'] ?>
              <select name="rekomendasi" class="form-select">
                <option <?= ($destinasi['rekomendasi'] == "ya") ? 'selected' : '' ?> value="ya">Ya</option>
                <option <?= ($destinasi['rekomendasi'] == "tidak") ? 'selected' : '' ?> value="tidak">Tidak</option>
              </select>
            </div>
            <div class="form-group py-2">
              <label class="form-label">Kota</label>
              <select name="kota_id" class="form-select">
                <option disabled selected>Pilih Kota</option>
                <?php foreach ($dataKota as $kota) : ?>
                  <option <?= ($destinasi['kota_id'] == $kota['id']) ? 'selected' : '' ?> value="<?= $kota['id'] ?>"><?= $kota['nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="py-3 text-end">
              <button class="btn btn-custom-3" type="submit">Edit</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>