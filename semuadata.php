<?php 
  include 'fungsi.php';

  $aduan = query("SELECT * FROM aduan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- icon boastrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
  .logo {
    text-decoration: none;
  }

  .navbar .container ul li a {
    border-radius: 5px;
  }


  .warna{
    background-color: #011627;
  }
</style>

<body>
<section>
<nav class="navbar navbar-expand-lg  fixed-top  " style="background-color:white ;">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="./img/Group 8.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fw-bold">
          <li class="nav-item me-3">
            <a class="nav-link text-danger" href="index.php">Beranda</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link text-danger" href="index.php#tentang">Tentang Kami</a>
          </li>
          <a href="index.php#mulai" class="btn btn-outline-danger">mulai</a> 
         
        </ul>
      </div>
    </div>
  </nav>

  <section class="my-5">

    <div class="container ">
      <h2 class="fw-bold d-flex justify-content-center my-5">Adua Terbaru</h2>
      

        <div class="row d-flex justify-content-evenly" >
          <?php foreach ($aduan as $adu) : ?>
            <div class="col-12 col-lg-4 col-md-4 mt-2">
              <div class="card  h-100" >
                <img src="img/<?= $adu['img']; ?>" class="card-img-top" alt="..."  style="height:230px ;">
                <div class="card-body">
                  <h5 class="card-title"><?= substr($adu['kritik'],0,25); ?>...</h5>
                  <p class="card-text"><?= substr($adu['saran'],0,60); ?>...</p>
                  <a href="selengkapnya.php?id=<?= $adu['id']; ?>" class="btn btn-danger">Lebih Lengkap</a> 
                </div>
              </div>
            </div>
          
        <?php endforeach; ?>
      </div>
    </div>

  </section>


  <section class="warna">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,224L34.3,240C68.6,256,137,288,206,288C274.3,288,343,256,411,218.7C480,181,549,139,617,128C685.7,117,754,139,823,170.7C891.4,203,960,245,1029,229.3C1097.1,213,1166,139,1234,117.3C1302.9,96,1371,128,1406,144L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
    <div class="container ">
      <div class="row text-light p-2 text-center  d-flex justify-content-evenly">
        <div class="col ">
          <h5><i class="bi bi-telephone-fill"></i> +62 852 1306 0504</h5>
          <h5 class="mt-3"><i class="bi bi-geo-alt-fill "></i> Jl. Kakatua II No.17, Makassar, <br>  Sulawesi Selatan</h5>
        </div>
        <div class="col">
          <h5><i class="bi bi-envelope-fill"></i> aidilashyariumar@gmail.com</h5>
          <h5 class="mt-3"><i class="bi bi-envelope-fill"></i> nurapriliaa242@gmail.com</h5>
          
        </div>
        <div class="col">
          <h5 ><i class="bi bi-instagram"></i> BekisarSulsel</h5>
          <h5 class="mt-3"><i class="bi bi-facebook"></i> Bekisar</h5>
        </div>
      </div>
    </div>
  </section>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>