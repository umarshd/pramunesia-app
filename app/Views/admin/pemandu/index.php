<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pemandu</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Pemandu</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card p-3 border-radius-10">
          <div class="row mb-3">
            <div class="col-lg-6">
              <h5 class="fw-bold text-2">Data Pemandu</h5>
            </div>
            <div class="col-lg-6 text-end">
              <a href="<?= base_url() ?>/admin/pemandu/tambah" class="btn btn-custom-3 text-white btn-sm">Tambah pemandu</a>
            </div>
          </div>
          <?php if (session()->get('success')) : ?>
            <div class="alert alert-success my-2" role="alert">
              <?= session()->get('success') ?>
            </div>
          <?php endif ?>
          <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($dataPemandu as $pemandu) : ?>
                <tr>
                  <th><?= $i++ ?></th>
                  <td><?= $pemandu['nama'] ?></td>
                  <td><?= $pemandu['email'] ?></td>
                  <td>
                    <a href="<?= base_url('/admin/pemandu/edit/' . $pemandu['id']) ?>">
                      <span class="badge bg-secondary">Edit</span>
                    </a>

                    <button type="button" class="border-0" style="background: transparent;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $pemandu['id'] ?>">
                      <span class=" badge bg-danger">Delete</span>
                    </button>
                  </td>
                </tr>
                <div class="modal fade" id="exampleModal<?= $pemandu['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="<?= base_url('/admin/pemandu/delete/' . $pemandu['id']) ?>" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
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