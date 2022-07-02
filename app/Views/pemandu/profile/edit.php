<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card p-3 border-radius-10 shadow-custom-2">
        <div class="row">
          <div class="col-lg-4 text-center">
            <div class="bg-custom-2 border-radius-10 p-4 d-flex align-items-center flex-column justify-content-center" style="height: 100%;">
              <div class="d-flex justify-content-center">
                <img src="<?= base_url() ?>/assets/img/pemandu/default.png" alt="" class="img-fluid">
              </div>
              <h4 class="text-white py-3">Nama Pemandu</h4>

            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="d-flex justify-content-between align-items-center">
              <h4>Edit</h4>
              <a href="<?= base_url() ?>/pemandu/profile" class="btn btn-custom-3 btn-sm">Kembali</a>
            </div>

            <form action="" method="post">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group py-2 text-start">
                    <label class="form-label text-2">No KTA</label>
                    <input type="text" class="form-control" name="id" value="<?= old('noKta') ?>" hidden>
                    <input type="text" class="form-control" name="noKta" value="<?= old('noKta') ?>" hidden>
                    <input type="text" class="form-control" name="noKtaDisplay" value="<?= old('noKta') ?>" disabled>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group py-2 text-start">
                    <label class="form-label text-2">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= old('nama') ?>">
                  </div>
                </div>
              </div>
              <div class="form-group py-2 text-start">
                <label class="form-label text-2">Image</label>
                <input type="file" class="form-control" name="file" value="<?= old('nama') ?>">
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

              <div class="text-center mt-3 mb-2">
                <button type="submit" class="btn btn-custom-3">Edit</button>
              </div>
            </form>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>