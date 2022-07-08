<?php 
    include 'fungsi.php';

    $id=$_GET['id'];

    $aduan = query("SELECT * FROM aduan WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selengkapnya</title>
     <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
  <!-- icon boastrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .navbar a{
        text-decoration: none;
    }
    .container .img{
        margin: 100px auto 0 auto;
    }
    .container .text{
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }
    .container .text p span{
        font-weight: bold;
    }
    .navbar .container ul li {
        border-radius: 5px;
    }
    .container .img-info {
      width: 80%;
      height: 400px;
      background-image: url(./img/<?= $aduan['img'] ?>);
      background-size: cover;
      background-position: center;
    }
    .warna{
    background-color: #011627;
  }
  .jarak{
    margin-top: 200px;
  }
</style>
<body>

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


      <section class="jarak">
          <div class="container ">
              <div class="img d-flex justify-content-center">  
                  <!-- <img  src="" width="80%" height="100%" alt=""> -->
                  <div class="img-info"></div>
                </div>
                <div class="text ">
                    <h3><?= $aduan['kritik']; ?></h3>
                    <p><?= $aduan['saran']; ?></p>
                    
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
</body>
</html>