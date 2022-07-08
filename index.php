<?php

include 'fungsi.php';
if (isset($_POST["adu"])){
    if(tambah_data($_POST) > 0){
        echo"
             <script>
                 alert('data berhasil ditambahkan');
                 document.location.href = 'index.php';
             </script>
         ";
    }else{
         echo"
             <script>
                 alert('data gagal ditambahkan');
                 document.location.href = 'index.php';
             </script>
          ";
    }
}

$aduan = query("SELECT * FROM aduan ORDER BY id DESC LIMIT 3");

$count = mysqli_query($conn,"SELECT * FROM aduan");
$jumlah_barang = mysqli_num_rows($count);

if(isset($_POST['cari'])){
  $kegiatan = cari($_POST["keyword"],);
}else{
  $kegiatan = query("SELECT * FROM aduan ORDER BY id ASC");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
  .logo {
    background-color: #F02C2E;
    background-image: url(./img/Vector.png);
    padding: 20px;
  }

  .navbar {
    box-shadow: 1px 1px 3px;
  }

  .jumlah {

    background-image: linear-gradient(to bottom right, #F02C2E, #F87F81);
    width: 100%;
    color: white;
    padding: 100px;
    text-align: center;

  }

  .warna{
    background-color: #011627;
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
            <a class="nav-link" href="index.php">Beranda</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="index.php#">Tentang Kami</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link ">Penelusuran</a>
          </li>
          <button type="button" class="btn btn-outline-danger">Mulai</button>
        </ul>
      </div>
    </div>
  </nav>

  <section class="container d-flex justify-content-between align-items-center " style="margin-top: 250px;">
    <div class="container">
      <div class="row  d-flex justify-content-between align-items-center " style="">
        <div class="col-12 col-lg-6 col-md-6">
          <div class="div">
            <h1 class="fw-bold">Selamat Datang di Berkisar</h1>
            <p>Berkisar adalah sebuah tempat bagi <br>
              Masyarakat Sulawesi Selatan untuk <br>
              berkeluh kesah pada Pemerintah</p>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6 ">
          <div class="div">
            <img src="./img/Gambar.png" alt="">
          </div>
        </div>

      </div>
    </div>
  </section>


  <section class="container mt-5">
    <div class="container">
      <div class="row  d-flex justify-content-between align-items-center">
        <div class="col col-12 col-lg-6 col-md-">
          <div class="img">
            <img src="./img/Group 27.jpg" alt="">
          </div>
        </div>
        <div class="col col-12 col-lg-6 col-md-">
          <div class="kritik" style="width:100% ;">
            <h2>Silahkan mulai berkeluh kesah!</h2>
            
            <form method="post" action="" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="kritik" class="form-label">Kritik</label>
                <textarea type="text" class="form-control" id="kritik" name="kritik"> </textarea>
              </div>
              <div class="mb-3">
                <label for="saran" class="form-label">Saran</label>
                <textarea type="text" class="form-control" id="saran" name="saran"> </textarea>
              </div>
              <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select id="kategori" name="kategori" class="form-select">
                  <option>lain-lain</option>
                  <option>banjir</option>
                  <option>gempa</option>
                  <option>jalan berlubang</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="instansi" class="form-label">instansi</label>
                <select id="instansi" name="instansi" class="form-select">
                  <option>KABUPATEN SINJAI</option>
                  <option>KABUPATEN MAROS</option>
                  <option>KABUPATEN GOWA</option>
                  <option>KABUPATEN BONE</option>
                  <option>KABUPATEN TAKALAR</option>
                  <option>KABUPATEN BULUKUMBA</option>
                  <option>KABUPATEN BANTAENG</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="img" class="form-label ">GAMBAR</label>
                <input type="file" name="img" class="form-control" id="img" aria-describedby="emailHelp">
              </div>
             
              <button type="submit" class="btn btn-danger" name="adu">KIRIM</button>
            </form>
          </div>
        </div>

      </div>
    </div>


  </section>

  <section>
    <h2 class=" d-flex justify-content-center mt-5">Website Pemerintah Yang Terhubung</h2>
    <div class="logo mt-4">
      <div class="container mt-2">


        <div class="logo1 d-flex justify-content-around ">
         <a href="https://sinjaikab.go.id/"><img src="./img/sinjai.png" alt=""></a> 
         <a href="https://bulukumbakab.go.id/"><img src="./img/bulkum 1.png" alt=""></a> 
         <a href="https://maroskab.go.id/"><img src="./img/LOGO MAROS.png" alt=""></a> 
         <a href="https://jenepontokab.go.id/"><img src="./img/jeneponto 1.png" alt=""></a> 
         <a href="http://gowakab.go.id/"><img src="./img/gowa 1.png" alt=""></a> 
        
        </div>
        <div class="logo1 d-flex justify-content-around mt-4">
        <a href="https://kepulauanselayarkab.go.id/"><img src="./img/selayar 1.png" alt=""></a> 
        <a href="https://bone.go.id/"><img src="./img/bone 1.png" alt=""></a> 
        <a href="https://luwuutarakab.go.id/"><img src="./img/lutra 1.png" alt=""></a> 
        <a href="https://www.luwutimurkab.go.id/"><img src="./img/luwu timur 1.png" alt=""></a> 
        <a href="https://sidrapkab.go.id/"><img src="./img/sidrap 1.png" alt=""></a> 
        </div>

      </div>
    </div>
  </section>
  <!-- proses berkeluh kesah -->
  <section>
    <div class="container my-5">
      <h2 class="fw-bold d-flex justify-content-center my-5">Proses Berkeluh Kesah</h2>
      <div class="d-flex justify-content-center">
        <img class="" src="./img/Group 28.png" style="width: 80%;" alt="">
      </div>
    </div>
  </section>

  <section>
    <div class="jumlah">
      <h2 class="my-4">Jumlah Aduan Yang Masuk</h2>
      <h1 class="fw-bold"><?php echo"$jumlah_barang" ?></h1>
    </div>
  </section>

  <!-- aduan -->
  <section class="my-5">

    <div class="container ">
      <h2 class="fw-bold d-flex justify-content-center my-5">Adua Terbaru</h2>
      <div class="d-flex justify-content-center">

        <div class="row d-flex justify-content-evenly">
          <?php foreach ($aduan as $adu) : ?>
            <div class="col-12 col-lg-4 col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="img/<?= $adu['img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= substr($adu['kritik'],0,25); ?>...</h5>
                  <p class="card-text"><?= substr($adu['saran'],0,60); ?>...</p>
                  <a href="#" class="btn btn-danger">Lebih Lengkap</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </section>

  <!-- penelusuran -->
  <section>
    <div class="container">

      <h2 class="fw-bold d-flex justify-content-center my-5">PENELUSURAN ADUAN</h2>
      <form class="" style="" method="post" action="" >
        <input class="form-control me-2" type="search" name="keyword" placeholder="Cari Aduan" aria-label="Search">
        <button class="btn btn-danger d-flex justify-content-center my-5" name="cari" style="width: 10% ; margin:0px auto;"
          type="submit">CARI</button>
      </form>
    </div>
  </section>
  <!-- tenteng kami -->
  <section>
    <div class="">
      <h2 class="d-flex justify-content-center fw-bold">Tentang Kami</h2>
      <div class="p-1" style="width:75%; margin:0px auto; background-color: #011627; color:white;">
        <h3 class="d-flex justify-content-center">Berkisar</h3>
        <p style="text-indent: 50px;">Berkisar (Beri Kritik dan Saran) adalah sebuah wadah berbentuk website yang
          menjadi tempat untuk masyarakat Sulawesi Selatan di beberapa Kabupaten agar bisa berkeluh kesah tentang hal -
          hal yang berhubungan dengan kepemerintahan. <br></p>
        <p style="text-indent: 50px;">Berkisar diciptakan pada tanggal 10 Desember 2021 oleh seseorang yang tidak ingin
          disebutkan namanya. Awalnya, Berkisar dibuat untuk memenuhi presentasi karya, tapi seiiring berjalannya waktu
          Berkisar mulai dikembangkan dan menjadi seperti saat ini. <br></p>
        <p style="text-indent: 50px;">Berkisar diharapkan menjadi salah satu tempat terpercaya untuk masyarakat yang
          ingin mengeluarkan keluh kesahnya kepada Pemerintah.
        </p>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
</body>

</html>