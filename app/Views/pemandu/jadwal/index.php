<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 70vh ;">
  <div class="row mt-3">
    <div class="col-lg-12">
      <div class="card p-3 border-radius-10">
        <div class="row align-items-center my-3">
          <div class="col-6">
            <h5 class="text-2">Data Jadwal Memandu</h5>
          </div>
        </div>
        <table id="example" class="table table-striped dt-responsive nowrap " style="width:100%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal Pemesanan</th>
              <th scope="col">Tanggal Keberangkatan</th>
              <th scope="col">Tanggal Berakhir</th>
              <th scope="col">Pemandu</th>
              <th scope="col">Wisatawan</th>


            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($dataTransaksi as $transaksi) : ?>
              <tr>
                <th><?= $i++ ?></th>
                <td><?= $transaksi['status'] ?></td>
                <td><?= $transaksi['tanggal_pemesanan'] ?></td>
                <td><?= $transaksi['tanggal_keberangkatan'] ?></td>
                <td><?= $transaksi['tanggal_berakhir'] ?></td>
                <td><?= $transaksi['nama_pemandu'] ?></td>
                <td><?= $transaksi['nama_wisatawan'] ?></td>

              </tr>

            <?php endforeach ?>


          </tbody>
        </table>
      </div>

      <div class="card p-3 border-radius-10 mt-5">
        <div class="row align-items-center my-3">
          <div class="col-6">
            <h5 class="text-2">Data Manual Jadwal Memandu</h5>
          </div>
          <div class="col-6 text-end">
            <a href="<?= base_url() ?>/pemandu/manual/transaksi/tambah" class="btn btn-custom-3 btn-sm">Tambah</a>
          </div>
        </div>
        <?php if (session()->get('success')) : ?>
          <div class="alert alert-success my-2" role="alert">
            <?= session()->get('success') ?>
          </div>
        <?php endif ?>
        <table id="exampleTableManualTransaksi" class="table table-striped dt-responsive nowrap " style="width:100%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal Pemesanan</th>
              <th scope="col">Tanggal Keberangkatan</th>
              <th scope="col">Tanggal Berakhir</th>
              <th scope="col">Pemandu</th>
              <th scope="col">Wisatawan</th>


            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataManualTransaksi as $transaksi) : ?>
              <tr>
                <th><?= $i++ ?></th>
                <td><?= $transaksi['status'] ?></td>
                <td><?= $transaksi['tanggal_pemesanan'] ?></td>
                <td><?= $transaksi['tanggal_keberangkatan'] ?></td>
                <td><?= $transaksi['tanggal_berakhir'] ?></td>
                <td><?= $transaksi['nama_pemandu'] ?></td>
                <td><?= $transaksi['nama_wisatawan'] ?></td>

              </tr>

            <?php endforeach ?>


          </tbody>
        </table>
      </div>
    </div>


  </div>

</div>
<?= $this->endSection() ?>