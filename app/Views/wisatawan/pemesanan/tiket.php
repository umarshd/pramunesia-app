<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card p-3  border-radius-10 shadow-custom-2">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <h4 class="text-2 mb-1 mt-3">
              <a class="text-2" href="<?= base_url() ?>/wisatawan/pemesanan"><i class="fas fa-arrow-alt-circle-left"></i></a>
              E-Ticket PRAMUNESIA
            </h4>
            <h6 class="text-3">Nomer TIket : #<?= $tiket['nomor_tiket'] ?></h6>
            <h3 class="mb-0 mt-3"><?= $tiket['nama_wisatawan'] ?></h3>
          </div>
          <div>
            <img src="<?= base_url() ?>/assets/icon-192x192.png" alt="" height="100">
          </div>
        </div>

        <hr>
        <h5>Kota Tujuan : <?= $tiket['nama_kota'] ?> </h5>
        <p>Tanggal pemesanan : <?= $tiket['tanggal_pemesanan'] ?> </p>
        <p>Tanggal berlibur : <?= $tiket['tanggal_keberangkatan'] ?> s/d <?= $tiket['tanggal_berakhir'] ?> </p>
        <p>Nama Pemandu : <?= $tiket['nama_pemandu'] ?> </p>


        <hr>

        <div>
          <h5>Catatan :</h5>
          <ol>
            <li>Tunjukkan e-ticket dan identitas diri ketika transaksi bersama pemandu wisata</li>
            <li>E-ticket bersifat sah dan dapat dipertanggung jawabkan</li>
          </ol>
        </div>
        <div class="text-end">
          <a href="<?= base_url() ?>/wisatawan/pemesanan" class="btn btn-secondary">Kembali</a>
          <a href="<?= base_url() ?>/wisatawan/pemesanan/tiket/cetak/<?= $tiket['nomor_tiket'] ?>" class="btn btn-custom-3" target="_blank">Cetak</a>

        </div>
      </div>


    </div>
  </div>
</div>
<?= $this->endSection() ?>