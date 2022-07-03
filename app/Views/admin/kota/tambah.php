<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">



  <div class="pagetitle">
    <h1>Kota</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Kota</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center" style="min-height: 60vh;">

      <div class="col-lg-6">
        <div class="card p-3">
          <h5 class="text-2 fw-bold">Tambah Kota</h5>
          <?php if (session()->get('error')) : ?>
            <div class="alert alert-danger my-2" role="alert">
              <?= session()->get('error') ?>
            </div>
          <?php endif ?>
          <form action="<?= base_url() ?>/admin/kota/tambah/proses" method="post">
            <div class="form-group">
              <label class="form-label">Nama Kota</label>
              <input type="text" name="nama" class="form-control">

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