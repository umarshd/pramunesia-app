<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 70vh ;">
  <div class="row mt-3">
    <div class="col-lg-12">
      <div class="card p-3 border-radius-10">
        <div class="row align-items-center my-3">
          <div class="col-lg-6">
            <h5 class="text-2">Data Jadwal Memandu</h5>
          </div>
          <div class="col-lg-6 text-end">
            <a href="<?= base_url() ?>/pemandu" class="btn btn-custom-3 btn-sm">Kembali</a>
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
                  <a href="<?= base_url('/admin/kota/edit/' . $transaksi['id']) ?>">
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

</div>
<?= $this->endSection() ?>