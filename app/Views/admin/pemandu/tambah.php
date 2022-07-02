<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">



  <div class="pagetitle">
    <h1>Pemandu</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pemandu</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center">

      <div class="col-lg-8">
        <div class="card p-3">
          <?php if (session()->get('error')) : ?>
            <div class="alert alert-danger my-2" role="alert">
              <?= session()->get('error') ?>
            </div>
          <?php endif ?>
          <h5 class="text-2 fw-bold">Tambah Pemandu</h5>
          <form action="<?= base_url() ?>/admin/pemandu/tambah/proses" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">No KTA</label>
                  <input type="text" class="form-control" name="noKta" value="<?= old('noKta') ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?= old('nama') ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Email</label>
                  <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">No Telepon</label>
                  <input type="text" class="form-control" name="telepon" value="<?= old('telepon') ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?= old('alamat') ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2"> Organisasi/Lembaga/Individu</label>
                  <select name="jenis" class="form-select">
                    <option disabled selected>Pilih Jenis Akun</option>
                    <option value="organisasi">Organisasi</option>
                    <option value="lembaga">Lembaga</option>
                    <option value="individu">Individu</option>
                  </select>
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
              <button type="submit" class="btn btn-custom-3">Tambah</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>