<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-4 mt-3">
          <div class="card p-3 bg-custom-2 text-center">
            <h5 class="text-white">Data Pemandu</h5>
            <h3 class="text-3"><?= $countPemandu ?></h3>
          </div>
        </div>
        <div class="col-lg-4 mt-3">
          <div class="card p-3 bg-custom-2 text-center">
            <h5 class="text-white">Data Wisatawan</h5>
            <h3 class="text-3"><?= $countWisatawan ?></h3>
          </div>
        </div>
        <div class="col-lg-4 mt-3">
          <div class="card p-3 bg-custom-2 text-center">
            <h5 class="text-white">Data Transaksi</h5>
            <h3 class="text-3"><?= $countTransaksi ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg-12">
      <div class="card p-3">
        <h5 class="text-2">Data Transaksi Terbaru</h5>
        <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal Pemesanan</th>
              <th scope="col">Tanggal Keberangkatan</th>
              <th scope="col">Tanggal Berakhir</th>
              <th scope="col">Pemandu</th>
              <th scope="col">Wisatawan</th>
              <th scope="col">Aksi</th>

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
                <td>
                  <a href="<?= base_url('/admin/transaksi/edit/' . $transaksi['id']) ?>">
                    <span class="badge bg-secondary">Edit</span>
                  </a>

                  <button type="button" class="border-0" style="background: transparent;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $transaksi['id'] ?>">
                    <span class=" badge bg-danger">Delete</span>
                  </button>
                </td>
              </tr>
              <div class="modal fade" id="exampleModal<?= $transaksi['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h4 class="h4">
                        Apakah kamu yakin menghapus data ini ?</h4>
                      <p>Data ini akan hilang selamanya</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?= base_url('/admin/transaksi/delete/' . $transaksi['id']) ?>" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>


          </tbody>
        </table>
      </div>
    </div>


  </div>



</main><!-- End #main -->

<?= $this->endSection() ?>