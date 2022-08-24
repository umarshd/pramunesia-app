<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="dicoding:email" content="kusumarahmah2@gmail.com">

  <!-- Favicons -->
  <link href="<?= base_url() ?>/assets/icon-192x192.png" rel="icon">
  <link href="<?= base_url() ?>/assets/icon-192x192.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
  <title>Pramunesia</title>
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
            <?php if (session()->get('pemandu_id')) : ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user h4"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="<?= base_url() ?>/pemandu">Dashboard</a></li>
                  <li><a class="dropdown-item" href="<?= base_url() ?>/pemandu/profile/">Akun</a></li>
                  <li><a class="dropdown-item" href="<?= base_url() ?>/pemandu/logout">Keluar</a></li>
                </ul>
              </li>
            <?php elseif (session()->get('wisatawan_id')) : ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user h4"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="<?= base_url() ?>/wisatawan">Dashboard</a></li>
                  <li><a class="dropdown-item" href="<?= base_url() ?>/wisatawan/profile/">Akun</a></li>
                  <li><a class="dropdown-item" href="<?= base_url() ?>/wisatawan/logout">Keluar</a></li>
                </ul>
              </li>
            <?php elseif (session()->get('admin_id')) : ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user h4"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="<?= base_url() ?>/admin/dashboard">Dashboard</a></li>
                  <li><a class="dropdown-item" href="<?= base_url() ?>/admin/logout">Keluar</a></li>
                </ul>
              </li>
            <?php else : ?>
              <li class="nav-item mx-lg-2 d-block mt-2 mt-lg-0">
                <a class="nav-link btn btn-secondary px-3 d-block text-white" href="<?= base_url() ?>/wisatawan/registrasi">Registrasi</a>
              </li>
              <li class="nav-item mx-lg-2 d-block mt-2 mt-lg-0">
                <a class="nav-link btn btn-custom-3 px-3 d-block text-white" href="<?= base_url() ?>/wisatawan/login">Login</a>
              </li>
            <?php endif ?>


          </ul>
        </div>
      </div>
    </nav>
  </header>
  <?= $this->renderSection('content') ?>

  <footer class="py-3">
    <p class="text-center text-muted p-0 m-0">@2022 PRAMUNESIA</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>

  <!-- Datatable -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
      $('#exampleTableManualTransaksi').DataTable();
    });
  </script>

  <script src="<?= base_url() ?>/assets/js/main.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>