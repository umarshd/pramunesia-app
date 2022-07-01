<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Sidang</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Sidang</h5>
            <?php if (session()->get('success')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
              </div>
            <?php endif ?>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama Mahasiswa</th>
                  <th scope="col">Nama Penguji 1</th>
                  <th scope="col">Nama Penguji 2</th>
                  <th scope="col">Tanggal Sidang</th>

                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dataSidang as $sidang) : ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $sidang['nim'] ?></td>
                    <td><?= $sidang['nama_mahasiswa'] ?></td>
                    <?php foreach ($dosens as $dosen) : ?>
                      <?php if ($dosen['nip'] == $sidang['nip_penguji1']) : ?>
                        <td><?= $dosen['nama'] ?></td>
                      <?php endif ?>
                    <?php endforeach ?>
                    <?php foreach ($dosens as $dosen) : ?>
                      <?php if ($dosen['nip'] == $sidang['nip_penguji2']) : ?>
                        <td><?= $dosen['nama'] ?></td>
                      <?php endif ?>
                    <?php endforeach ?>

                    <td><?= $sidang['tanggal_sidang'] ?></td>
                  </tr>
                <?php endforeach ?>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Anda akan menghapus data ini ?</h4>
        <p>Data akan hilang selamanya</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>