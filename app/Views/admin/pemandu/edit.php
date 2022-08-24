<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">



  <div class="pagetitle">
    <h1>Pemandu</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pemandu</li>
        <li class="breadcrumb-item active">Edit</li>
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
          <h5 class="text-2 fw-bold">Edit Pemandu</h5>
          <form action="<?= base_url() ?>/admin/pemandu/edit/proses" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">No KTA</label>
                  <input type="text" class="form-control" name="id" value="<?= $pemandu['id'] ?>" hidden>
                  <input type="text" class="form-control" name="noKta" value="<?= $pemandu['noKta'] ?>" hidden>
                  <input type="text" class="form-control" name="noKtaDisplay" value="<?= $pemandu['noKta'] ?>" disabled>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?= $pemandu['nama'] ?>">
                </div>
              </div>
            </div>
            <div class="form-group py-2 text-start">
              <label class="form-label text-2">Image</label>
              <input type="file" class="form-control" name="file">
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Email</label>
                  <input type="email" class="form-control" name="emailOld" value="<?= $pemandu['email'] ?>" hidden>
                  <input type="email" class="form-control" name="email" value="<?= $pemandu['email'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">No Telepon</label>
                  <input type="text" class="form-control" name="telepon" value="<?= $pemandu['telepon'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?= $pemandu['alamat'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2 text-start">
                  <label class="form-label text-2"> Organisasi/Lembaga/Individu</label>
                  <select name="jenis" class="form-select">
                    <option <?= ($pemandu['jenis'] == 'organisasi') ? 'selected' : '' ?> value="organisasi">Organisasi</option>
                    <option <?= ($pemandu['jenis'] == 'lembaga') ? 'selected' : '' ?> value="lembaga">Lembaga</option>
                    <option <?= ($pemandu['jenis'] == 'individu') ? 'selected' : '' ?> value="individu">Individu</option>
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
            <div class="row">
              <div class="col-lg-12">
                <label class="form-label">Ringkasan</label>
                <textarea name="ringkasan" id="" cols="30" rows="5" class="form-control"><?= $pemandu['ringkasan'] ?></textarea>
                <small class="text-danger fst-italic">*Maksimal 100 karakter yang ditampilkan</small>
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