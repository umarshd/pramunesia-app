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

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
  <title>Pramunesia</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row h-100vh">
      <div class="col-lg-6 d-none d-lg-block">
        <div class="d-flex h-100vh justify-content-center align-items-center">
          <img src="<?= base_url() ?>/assets/images/logo-big.png">
        </div>
      </div>
      <div class="col-lg-6 bg-main py-4 text-center">

        <h6 class="text-white">Masuk sebagai Admin</h6>
        <h3 class="my-4 text-white">Selamat Datang</h3>

        <div class="container">
          <?php if (session()->get('error')) : ?>
            <div class="alert alert-danger my-2" role="alert">
              <?= session()->get('error') ?>
            </div>
          <?php endif ?>
          <?php if (session()->get('success')) : ?>
            <div class="alert alert-success my-2" role="alert">
              <?= session()->get('success') ?>
            </div>
          <?php endif ?>
          <form action="<?= base_url() ?>/admin/login/proses" method="post">
            <div class="form-group py-2 text-start">
              <label class="form-label text-white">Email</label>
              <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
            </div>
            <div class="form-group py-2 text-start">
              <label class="form-label text-white">Password</label>
              <input type="password" class="form-control" name="password">
            </div>

            <div class="text-center mt-3 mb-2">
              <button type="submit" class="btn btn-custom-3">Login</button>
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>