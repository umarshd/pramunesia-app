<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">



  <div class="pagetitle">
    <h1>Data Kota</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Kota</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center">

      <div class="col-lg-6">
        <div class="card p-3">
          <div class="row">
            <div class="col-lg-6">
              <h5>Edit Kota</h5>
            </div>
            <div class="col-lg-6 text-end">
              <a href="<?= base_url() ?>/admin/kota" class="btn btn-primary btn-sm">kembali</a>
            </div>
          </div>

          <?php if (session()->get('error')) : ?>
            <div class="alert alert-danger my-2" role="alert">
              <?= session()->get('error') ?>
            </div>
          <?php endif ?>
          <form action="<?= base_url() ?>/admin/kota/edit/proses" method="post">
            <div class="form-group">
              <label class="form-label">Nama Kota</label>
              <input type="text" name="id" class="form-control" value="<?= $kota['id'] ?>" hidden>
              <input type="text" name="nama" class="form-control" value="<?= $kota['nama'] ?>">

            </div>
            <div class="py-3 text-end">
              <button class="btn btn-primary" type="submit">Kirim</button>

            </div>
          </form>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>