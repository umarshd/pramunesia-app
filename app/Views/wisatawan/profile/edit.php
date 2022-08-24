<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card p-3 border-radius-10 shadow-custom-2">
        <div class="row">
          <div class="col-lg-4 text-center">
            <div class="bg-custom-2 border-radius-10 p-4 d-flex align-items-center flex-column justify-content-center" style="height: 100%;">
              <div class="d-flex justify-content-center">
                <img src="<?= base_url('/assets/img/wisatawan/' . $wisatawan['image']) ?>" alt="" class="rounded-circle" height="100px" width="100px">
              </div>
              <h4 class="text-white py-3"><?= $wisatawan['nama'] ?></h4>

            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">
            <?= session()->get('error') ?>
            <div class="d-flex justify-content-between align-items-center">
              <h4>Edit</h4>
              <a href="<?= base_url() ?>/wisatawan/profile" class="btn btn-custom-3 btn-sm">Kembali</a>
            </div>

            <form action="<?= base_url() ?>/wisatawan/profile/edit/proses" method="post" enctype="multipart/form-data">
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
    </div>
  </div>
</div>
<?= $this->endSection() ?>