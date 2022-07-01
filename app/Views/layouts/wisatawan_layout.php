<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
  <title>Hello, world!</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?= base_url() ?>/assets/nav-brand.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item ml-auto">
              <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>/tentang-kami">Tentang Kami</a>
            </li>
            <li class="nav-item mx-lg-2 d-block mt-2 mt-lg-0">
              <a class="nav-link btn btn-custom-3 px-3 d-block" href="<?= base_url() ?>/wisatawan/registrasi">Registrasi</a>
            </li>
            <li class="nav-item mx-lg-2 d-block mt-2 mt-lg-0">
              <a class="nav-link btn btn-custom-3 px-3 d-block" href="<?= base_url() ?>/wisatawan/login">Login</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <?= $this->renderSection('content') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/main.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>