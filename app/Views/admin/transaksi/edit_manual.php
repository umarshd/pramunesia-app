<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Transaksi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Transaksi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card p-3">
          <h5 class="fw-bold text-2">Data Transaksi</h5>

          <?php if (session()->get('success')) : ?>
            <div class="alert alert-success my-2" role="alert">
              <?= session()->get('success') ?>
            </div>
          <?php endif ?>
          <form action="<?= base_url() ?>/admin/transaksi/manual/edit/proses" method="post">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <label class="form-label text-2">Kota Tujuan</label>
                  <div class="text-3">
                    <?= $transaksi['nama_kota'] ?>
                  </div>
                  <input type="text" name="id" value="<?= $transaksi['id'] ?>" hidden>
                  <input type="text" name="kota_id" value="<?= $transaksi['kota_id'] ?>" hidden>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <label class="form-label text-2">Tanggal Pemesanan</label>
                  <div class="text-3">
                    <?= $transaksi['tanggal_pemesanan'] ?>
                  </div>
                  <input type="text" name="tanggal_pemesanan" value="<?= $transaksi['tanggal_pemesanan'] ?>" hidden>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <label class="form-label text-2">Tanggal Keberangkatan</label>
                  <div class="text-3">
                    <?= $transaksi['tanggal_keberangkatan'] ?>
                  </div>
                  <input type="text" name="tanggal_keberangkatan" value="<?= $transaksi['tanggal_keberangkatan'] ?>" hidden>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <label class="form-label text-2">Tanggal Berakhir</label>
                  <div class="text-3">
                    <?= $transaksi['tanggal_berakhir'] ?>
                  </div>
                  <input type="text" name="tanggal_berakhir" value="<?= $transaksi['tanggal_berakhir'] ?>" hidden>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group py-2">
                  <label class="form-label text-2">Pemandu</label>
                  <div class="text-3">
                    <?= $transaksi['nama_pemandu'] ?>
                  </div>
                  <input type="text" name="pemandu_id" value="<?= $transaksi['pemandu_id'] ?>" hidden>

                </div>
              </div>
              <div class="col-lg-6">

              </div>
            </div>


            <div class="form-group py-2">
              <label class="form-label text-2">Wisatawan</label>
              <input type="text" class="form-control" name="nama_wisatawan" value="<?= $transaksi['nama_wisatawan'] ?>">
            </div>
            <div class="form-group py-2">
              <label class="form-label text-2">Telepon Wisatawan</label>
              <input type="text" class="form-control" name="telepon_wisatawan" value="<?= $transaksi['telepon_wisatawan'] ?>">
            </div>
            <div class="form-group py-2">
              <label class="form-label text-2">Status Pembayaran</label>

              <select name="status" class="form-select">
                <option <?= ($transaksi['status'] == 'belum dibayar') ? 'selected' : '' ?> value="belum dibayar">Belum dibayar</option>
                <option <?= ($transaksi['status']) == 'sudah dibayar' ? 'selected' : '' ?> value="sudah dibayar">Sudah dibayar</option>
              </select>

            </div>
            <div class="text-end py-3">

              <button type="submit" class="btn btn-custom-3">Edit</button>
            </div>
          </form>


        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>