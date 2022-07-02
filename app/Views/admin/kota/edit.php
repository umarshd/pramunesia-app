<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Kota</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Kota</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center" style="min-height: 60vh;">

      <div class="col-lg-6">
        <div class="card p-3">
          <h5 class="fw-bold text-2">Edit Kota</h5>
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
              <button class="btn btn-custom-3" type="submit">Kirim</button>

            </div>
          </form>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>