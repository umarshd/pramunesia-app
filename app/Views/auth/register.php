<?= $this->extend('layouts/auth_layout') ?>
<?= $this->section('content') ?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">App Pendaftaran Sidang</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                  <p class="text-center small">Masukan data diri untuk mendaftar</p>
                </div>
                <?php if (session()->get('error')) : ?>
                  <div class="alert alert-danger" role="alert">
                    <div><?= session('error') ?></div>
                  </div>
                <?php endif ?>
                <form class="row g-3 needs-validation" novalidate method="POST" action="<?= base_url() ?>/register/proses">
                  <div class="col-12 col-lg-6">
                    <label for="yourUsername" class="form-label">NIM</label>
                    <div class="input-group has-validation">
                      <input type="text" name="nim" class="form-control" required>
                      <div class="invalid-feedback">Please enter your nim.</div>
                    </div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <input type="text" name="username" class="form-control" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <label for="yourPassword" class="form-label">Ulangi Password</label>
                    <input type="password" name="password2" class="form-control" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Daftar</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Sudah punya akun ? <a href="<?= base_url('/') ?>">Masuk</a></p>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?= $this->endSection() ?>