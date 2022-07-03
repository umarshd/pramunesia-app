<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Favicons -->
  <link href="<?= base_url() ?>/assets/icon-192x192.png" rel="icon">
  <link href="<?= base_url() ?>/assets/icon-192x192.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
  <title>Pramunesia</title>
</head>

<body>

  <div class="container my-3" style="min-height: 73vh ;">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card p-3  border-radius-10 shadow-custom-2">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <h4 class="text-2 mb-1 mt-3">

                E-Ticket PRAMUNESIA
              </h4>
              <h6 class="text-3">Nomer TIket : #<?= $tiket['nomor_tiket'] ?></h6>
              <h3 class="mb-0 mt-3"><?= $tiket['nama_wisatawan'] ?></h3>
            </div>
            <div>
              <img src="<?= base_url() ?>/assets/icon-192x192.png" alt="" height="100">
            </div>
          </div>

          <div class="my-2" style="border-bottom: 1px solid black;"></div>
          <h5>Kota Tujuan : <?= $tiket['nama_kota'] ?> </h5>
          <p>Tanggal pemesanan : <?= $tiket['tanggal_pemesanan'] ?> </p>
          <p>Tanggal berlibur : <?= $tiket['tanggal_keberangkatan'] ?> s/d <?= $tiket['tanggal_berakhir'] ?> </p>
          <p>Nama Pemandu : <?= $tiket['nama_pemandu'] ?> </p>


          <div class="my-2" style="border-bottom: 1px solid black;"></div>


          <div>
            <h5>Catatan :</h5>
            <ol>
              <li>Tunjukkan e-ticket dan identitas diri ketika transaksi bersama pemandu wisata</li>
              <li>E-ticket bersifat sah dan dapat dipertanggung jawabkan</li>
            </ol>
          </div>
        </div>


      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/main.js"></script>

  <script>
    window.print();
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel)
  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>