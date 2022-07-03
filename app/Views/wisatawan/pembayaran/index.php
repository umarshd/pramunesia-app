<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card p-3  border-radius-10 shadow-custom-2">

        <h4 class="text-2 mb-1 mt-3">
          <a class="text-2" href="<?= base_url() ?>/wisatawan/pemesanan"><i class="fas fa-arrow-alt-circle-left"></i></a>
          Info Pembayaran
        </h4>
        <hr>

        <?php
        $tanggal_mulai = strtotime($tiket['tanggal_keberangkatan']);
        $tanggal_selesai = strtotime($tiket['tanggal_berakhir']);

        $bedaHari = $tanggal_selesai - $tanggal_mulai;

        $beda = $bedaHari / 60 / 60 / 24 + 1;

        $totalBayar = 300000 * $beda;

        $hasil_rupiah = "Rp " . number_format($totalBayar, 2, ',', '.');


        ?>

        <h5>Total Pembayaran</h5>
        <h3 class="text-3"><?= $hasil_rupiah ?></h3>
        <small class="text-3">*Biaya pemesanan sesuai dengan jumlah di atas</small>

        <p class="mt-3">
          Dicek dalam 24 jam setelah bukti transfer diunggah. Wajib transfer sesuai dengan jumlah di atas.
          <br>
          Gunakan ATM / Banking / mBanking / setor tunai untuk transfer ke rekening <span class="text-3 fw-bold">PRAMUNESIA</span>
          berikut ini :
        </p>

        <h3 class="fw-bold text-2">Bank Mandiri</h3>
        <div class="row">
          <div class="col-lg-2">
            Nomor Rekening
          </div>
          <div class="col-lg-3">
            : 209128089
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2">
            Atas Nama
          </div>
          <div class="col-lg-3">
            : Pramunesia Indonesia
          </div>
        </div>

        <?php
        $tanggal_pemesanan = $tiket['tanggal_pemesanan'];
        $date1 = str_replace('-', '/', $tanggal_pemesanan);
        $tomorrow = date('d-m-Y', strtotime($date1 . "+1 days"));



        ?>

        <p class="mt-3">Setelah transfer silahkan unggah bukti transfer sebelum tanggal <?= $tomorrow ?> </p>

        <p>Demi kenyamanan dan keamanan bersama, mohon untuk TIDAK MEMBAGIKAN bukti transfer atau konfirmasi pemesanan
          kepada siapapun selain mengirimkannya kepada <a href="https://api.whatsapp.com/send/?phone=6285723391694&text=Konfirmasi%20pemesanan%20dengan%20nomor%20Tiket%20%3A%<?= $tiket['nomor_tiket'] ?>" style="text-decoration: none ; color:black">Whatsapp Official <span class="text-3">PRAMUNESIA</span></a> .</p>

        <hr>
        <div class="text-end">
          <a href="<?= base_url() ?>/wisatawan/pemesanan" class="btn btn-secondary">Unggah Nanti</a>
          <a href="https://api.whatsapp.com/send/?phone=6285723391694&text=Konfirmasi%20pemesanan%20dengan%20nomor%20Tiket%20%3A%<?= $tiket['nomor_tiket'] ?>" class="btn btn-custom-3">Unggah Sekarang</a>
        </div>
      </div>


    </div>
  </div>
  <?= $this->endSection() ?>