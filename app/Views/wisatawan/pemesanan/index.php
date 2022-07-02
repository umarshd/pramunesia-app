<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card p-3  border-radius-10 shadow-custom-2">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h4 class="text-2 my-3">Riwayat Pemesanan</h4>
          </div>

        </div>

        <div class="row">
          <?php foreach ($dataPemesanan as $pesanan) : ?>
            <div class="col-lg-6 mt-3">
              <div class=" bg-custom-2 border-0 border-radius-10 p-4 text-white">
                <h5>Kota Tujuan : <?= $pesanan['nama_kota'] ?> </h5>
                <p>Tanggal pemesanan : <?= $pesanan['tanggal_pemesanan'] ?> </p>
                <p>Tanggal berlibur : <?= $pesanan['tanggal_keberangkatan'] ?> s/d <?= $pesanan['tanggal_berakhir'] ?> </p>
                <p>Nama Pemandu : <?= $pesanan['nama_pemandu'] ?> </p>
                <p>Status Pemesanan : <?php if ($pesanan['status'] == 'belum dibayar') : ?>
                    <span class="badge bg-danger">Belum dibayar</span>
                  <?php elseif ($pesanan['status'] == 'sudah dibayar') : ?>
                    <span class="badge bg-success">Sudah dibayar</span>
                  <?php endif ?>
                </p>
                <div class="text-end">
                  <?php if ($pesanan['status'] == 'belum dibayar') : ?>
                    <a href="" class="btn btn-secondary">Bayar</a>
                  <?php elseif ($pesanan['status'] == 'sudah dibayar') : ?>
                    <a href="" class="btn btn-custom-3">Cetak Tiket</a>
                  <?php endif ?>


                </div>

              </div>
            </div>
          <?php endforeach ?>


        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>