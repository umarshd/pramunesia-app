<?= $this->extend('layouts/pemandu_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card p-3 bg-custom-2 border-radius-10 shadow-custom-2">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h4 class="text-white my-3">Dokumentasi Kegiatanmu</h4>
          </div>
          <div class="col-lg-6 text-end">
            <a href="<?= base_url() ?>/pemandu/kegiatan/tambah" class="btn btn-custom-3 btn-sm">Tambah Kegiatan</a>
          </div>
        </div>

        <div class="row">
          <?php foreach ($dataKegiatan as $kegiatan) : ?>
            <div class="col-lg-4 text-center mt-3">
              <div class=" card border-0 border-radius-10 p-4">
                <div style="height: 200px; overflow: hidden;">
                  <img src="<?= base_url('/assets/img/pemandu/kegiatan/' . $kegiatan['image']) ?>" alt="" class="img-fluid">
                </div>
                <div>
                  <p class="mt-3" style="min-height: 48px;">
                    <?= substr($kegiatan['deskripsi'], 0, 50) . '....' ?>
                  </p>
                </div>
                <div>
                  <button type="button" class="border-0" style="background: transparent;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $kegiatan['id'] ?>">
                    <span class=" badge bg-danger">Delete</span>
                  </button>
                </div>
                <div class="modal fade" id="exampleModal<?= $kegiatan['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="<?= base_url('/pemandu/kegiatan/delete/' . $kegiatan['id']) ?>" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>



        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>