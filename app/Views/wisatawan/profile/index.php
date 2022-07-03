<?php

use App\Controllers\Wisatawan;
?>
<?= $this->extend('layouts/wisatawan_layout') ?>
<?= $this->section('content') ?>
<div class="container my-3" style="min-height: 73vh ;">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card p-3 border-radius-10 shadow-custom-2">
        <div class="row">
          <div class="col-lg-6 text-center">
            <div class="bg-custom-2 border-radius-10 p-4">
              <div class="d-flex justify-content-center">
                <img src="<?= base_url('/assets/img/wisatawan/' . $wisatawan['image']) ?>" alt="" class="rounded-circle" height="100px" width="100px">
              </div>
              <h4 class="text-white py-3"><?= $wisatawan['nama'] ?></h4>
              <a href="<?= base_url('/wisatawan/profile/edit/' . $wisatawan['id']) ?>">
                <i class="fas fa-edit text-3" style="font-size: 200%;"></i></a>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="d-flex justify-content-between align-items-center">
              <h4>Edit</h4>
              <a href="<?= base_url() ?>/wisatawan" class="btn btn-custom-3 btn-sm">Kembali</a>
            </div>


            <a href="<?= base_url() ?>/wisatawan/pemesanan" class="nav-link link-edit-profile">
              <div class="d-flex align-items-center justify-content-between editProfile">
                <span class="text-2">
                  Riwayat Pemesanan
                </span>
                <i class="fas fa-arrow-alt-circle-right text-3"></i>
              </div>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>