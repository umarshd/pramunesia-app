<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">



  <div class="pagetitle">
    <h1>Wisatawan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Wisatawan</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center">

      <div class="col-lg-8">
        <div class="card p-3">
          <h5 class="text-2 fw-bold">Edit Wisatawan</h5>
          <form action="<?= base_url() ?>/admin/wisatawan/edit/proses" method="post" enctype="multipart/form-data">
            <div class="form-group py-2 text-start">
              <label class="form-label text-2">Nama</label>
              <input type="text" class="form-control" name="id" value="<?= $wisatawan['id'] ?>" hidden>
              <input type="text" class="form-control" name="nama" value="<?= $wisatawan['nama'] ?>">
            </div>
            <div class="form-group py-2 text-start">
              <label class="form-label text-2">Image</label>
              <input type="file" class="form-control" name="file">
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Email</label>
                  <input type="email" class="form-control" name="emailOld" value="<?= $wisatawan['email'] ?>" hidden>
                  <input type="email" class="form-control" name="email" value="<?= $wisatawan['email'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">No Telepon</label>
                  <input type="text" class="form-control" name="telepon" value="<?= $wisatawan['telepon'] ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Konfirmasi Password</label>
                  <input type="password" class="form-control" name="passwordVerif">
                </div>
              </div>
            </div>

            <div class="text-end mt-3 mb-2">
              <button type="submit" class="btn btn-custom-3">Edit</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>