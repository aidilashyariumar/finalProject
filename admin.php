<?php 

session_start();
include'fungsi.php';

if(!isset($_SESSION['userweb'])){
    header('location:login.php');
};

// $aduan = query("SELECT * FROM aduan ");


if (isset($_POST["hapus"])){
 if(hapus_data($_POST) > 0){
     echo"
          <script>
              alert('data berhasil dihapus');
              document.location.href = 'admin.php';
          </script>
      ";
 }else{
      echo"
          <script>
              alert('data gagal dihapus');
              document.location.href = 'admin.php';
          </script>
       ";
 }
}





if (isset($_POST["aduan"])){
    if(tambah_data($_POST) > 0){
        echo"
             <script>
                 alert('data berhasil ditambahkan');
                 document.location.href = 'admin.php';
             </script>
         ";
    }else{
         echo"
             <script>
                 alert('data gagal ditambahkan');
                 document.location.href = 'admin.php';
             </script>
          ";
    }
}



if (isset($_POST["adu"])){
 if(edit_data($_POST) > 0){
     echo"
          <script>
              alert('data berhasil ditambahkan');
              document.location.href = 'admin.php';
          </script>
      ";
 }else{
      echo"
          <script>
              alert('data gagal ditambahkan');
              document.location.href = 'admin.php';
          </script>
       ";
 }
}
$jmldataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM aduan"));
$jumlahhalaman = ceil($jumlahdata / $jmldataperhalaman);
$halamanaktif = (isset($_GET['halaman']) ? $_GET['halaman']: 1);
$awladata = ($jmldataperhalaman * $halamanaktif) - $jmldataperhalaman;


$aduan = query("SELECT * FROM aduan LIMIT $awladata,$jmldataperhalaman");

if(isset($_POST['cari'])){
    $aduan = cari($_POST["keyword"],$awladata,$jmldataperhalaman);
}else{
    $aduan = query("SELECT * FROM aduan LIMIT $awladata,$jmldataperhalaman");
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

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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

    .banner {
        margin-top: 150px;
        height: 100vh;
    }

    .banner h5 {

        font-family: 'Montserrat', sans-serif;

    }

    .navbar img {
        height: 50px;
    }
    .isi{
        margin-top:100px;
    }
    .pagination a{
        text-decoration: none;
        color: black;
    }
    
  .warna{
    background-color: #011627;
  }
</style>
<body>
<section class="">
        <nav class="navbar  navbar-expand-lg navbar-light bg-light  ">
            <div class="container ">
                <div class="brand d-flex justify-content-between align-items-center">
                    <a href="adminutama.php" class="logo d-flex">
                        <img src="./img/Group 8.png" alt="" class=" ">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-ligth " id="navbarNav">
                    <ul class="nav navbar-nav ms-auto d-flex align-items-center ">
                       
                        <li>
                            <a href="logout.php " class="btn btn-danger" >Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section>
        <div class="isi">

            <h4 class="text-center mt-3" id="berita">Beri Kritik dan Saran </h4
                class="text-center">
                <div class="container d-flex justify-content-between align-items-center mb-3">
      

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah data
            </button>
            <div class="kosong">
                    <form class="d-flex" action="" method="post">
                        <input size="50" name="keyword" class="form-control me-2"  type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" name="cari" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    </div>
    </div>            
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aduan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
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
             
              <button type="submit" class="btn btn-danger" name="aduan">KIRIM</button>
        </form>
    </div>
</div>
</div>
</div>



<div class="container d-flex justify-content-center ">

<table class=""  cellpadding="10" cellspacing="0">
    <tr>
        <th>NO</th>
        <th>EMAIL</th>
        <th>KRITIK</th>
        <th>SARAN</th>
        <th>KATEGORI</th>
        <th>INSTANSI</th>
        <th>GAMBAR</th>
        <th colspan="2" class="text-center">Aksi</th>
    </tr>

    <?php 
        $i = 1;
        foreach ($aduan as $adu) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td> <?= $adu['email']; ?></td>
        <td><?= $adu['kritik']; ?></td>
        <td><?= $adu['saran']; ?></td>
        <td><?= $adu['kategori']; ?></td>
        <td><?= $adu['instansi']; ?></td>
        <td><img src=" img/<?= $adu['img']; ?>" width="40px" alt=""></td>
        <td>
<button type="button" class="btn btn-dark" id="daftar" data-bs-toggle="modal" data-bs-target="#modal<?= $adu['id']; ?>">
    ubah
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal<?= $adu['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <?php 
                $id =  $adu['id']; 
                $edit_aduan = query("SELECT * FROM aduan WHERE id = $id");
                ?>
                <input type="hidden" name="id" value="<?= $id;?>">
                <?php foreach ($edit_aduan as $edit_adu):?>
               

                 <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email"  value="<?= $edit_adu['email'];?>" name="email" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="kritik" class="form-label">Kritik</label>
                <textarea type="text" class="form-control" id="kritik"  value="<?= $edit_adu['kritik'];?>" name="kritik"> </textarea>
              </div>
              <div class="mb-3">
                <label for="saran" class="form-label">Saran</label>
                <textarea type="text" class="form-control" id="saran"  value="<?= $edit_adu['saran'];?>" name="saran"> </textarea>
              </div>
              <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select id="kategori" name="kategori"  value="<?= $edit_adu['kategori'];?>" class="form-select">
                  <option>lain-lain</option>
                  <option>banjir</option>
                  <option>gempa</option>
                  <option>jalan berlubang</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="instansi" class="form-label">instansi</label>
                <select id="instansi" name="instansi"  value="<?= $edit_adu['instansi'];?>" class="form-select">
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
            <?php endforeach ?>
        </form>
    </div>
</div>
</div>
            </td>
            <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $adu['id'];?>">
                <button class="btn btn-danger text-light" type="submit" name="hapus">hapus</button>
            </form>
        </td>
    </tr>

    <?php  
    $i++;
endforeach;
?>

</table>

</div>


<div class="pagination justify-content-center">
            <?php if($halamanaktif >  1) :?>
                <a href="?halaman=<?= $halmanaktif - 1; ?>"><h3>&lt;</h3></a>
            <?php endif; ?>

            <?php for( $i = 1; $i <= $jumlahhalaman; $i++):?>
                <?php if($i == $halamanaktif) : ?>
                <a class="ms-3" href="?halaman=<?= $i; ?>" style="font-weight:bold; color:red;"><h3><?= $i; ?></h3></a>
                <?php else : ?>
                <a class="ms-3" href="?halaman=<?= $i; ?>"><h3><?= $i; ?></h3></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if($halamanaktif  <  $jumlahhalaman) :?>
                <a class="ms-3" href="?halaman=<?= $halmanaktif + 1; ?>"><h3>&gt;</h3></a>
            <?php endif; ?>
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