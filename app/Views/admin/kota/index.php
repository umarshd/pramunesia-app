<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Kota</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card p-3">
          <div class="row">
            <div class="col-lg-6">
              <h5>Datatables</h5>
            </div>
            <div class="col-lg-6 text-end">
              <a href="<?= base_url() ?>/admin/kota/tambah" class="btn btn-primary btn-sm">Tambah Kota</a>
            </div>
          </div>
          <?php if (session()->get('success')) : ?>
            <div class="alert alert-success my-2" role="alert">
              <?= session()->get('success') ?>
            </div>
          <?php endif ?>
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($dataKota as $kota) : ?>
                <tr>
                  <th><?= $i++ ?></th>
                  <td><?= $kota['nama'] ?></td>
                  <td>
                    <span class="badge bg-secondary">edit</span>
                    <span class="badge bg-danger">delete</span>
                  </td>
                </tr>
              <?php endforeach ?>


            </tbody>
          </table>
          <!-- End Table with stripped rows -->


        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>