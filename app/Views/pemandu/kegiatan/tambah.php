<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card p-3 shadow-custom-2 border-radius-10">
        <h5 class="text-2 fw-bold">
          <a class="text-2" href="<?= base_url() ?>/pemandu/kegiatan"><i class="fas fa-arrow-alt-circle-left"></i></a>
          Tambah Kegiatan
        </h5>
        <?php if (session()->get('error')) : ?>
          <div class="alert alert-danger my-2" role="alert">
            <?= session()->get('error') ?>
          </div>
        <?php endif ?>
        <form action="<?= base_url() ?>/pemandu/kegiatan/tambah/proses" enctype="multipart/form-data" method="post">
          <div class="form-group py-2">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="file">
            <input type="text" name="pemandu_id" value="<?= session()->get('pemandu_id') ?>" hidden>
          </div>
          <div class="form-group py-2">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" cols="30" rows="6" class="form-control"><?= old('deskripsi') ?></textarea>
          </div>
          <div class="text-end my-3">
            <button type="submit" class="btn btn-custom-3">Tambah</button>
          </div>
        </form>
      </div>


    </div>
  </div>
</div>
<?= $this->endSection() ?>