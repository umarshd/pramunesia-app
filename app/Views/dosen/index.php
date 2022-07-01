<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Dosen</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Dosen</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dosen</h5>
            <?php if (session()->get('success')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
              </div>
            <?php endif ?>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">NIP</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dosens as $dosen) : ?>
                  <tr>
                    <td><?= $dosen['nip'] ?></td>
                    <td><?= $dosen['nama'] ?></td>
                    <td>

                      <a href="<?= base_url('admin/dosen/edit/' . $dosen['nip']) ?>" class="btn btn-secondary text-white"> <i class="bi bi-pencil-square"></i></a>
                      <a href="#" data-href="<?= base_url('admin/dosen/delete/' . $dosen['nip']) ?>" onclick="confirmToDelete(this)" class="btn btn-danger text-white"> <i class="bi bi-trash"></i></a>
                    </td>
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