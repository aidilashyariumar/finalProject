<?php 

session_start();
include'fungsi.php';

if(!isset($_SESSION['userweb'])){
    header('location:loginadmin.php');
};

// $kegiatan = query("SELECT * FROM kegiatan ");


if (isset($_POST["hapus"])){
 if(hapus_data($_POST) > 0){
     echo"
          <script>
              alert('data berhasil dihapus');
              document.location.href = 'kegiatanadmin.php';
          </script>
      ";
 }else{
      echo"
          <script>
              alert('data gagal dihapus');
              document.location.href = 'kegiatanadmin.php';
          </script>
       ";
 }
}





if (isset($_POST["kegiatan"])){
    if(tambah_data($_POST) > 0){
        echo"
             <script>
                 alert('data berhasil ditambahkan');
                 document.location.href = 'adminutama.php';
             </script>
         ";
    }else{
         echo"
             <script>
                 alert('data gagal ditambahkan');
                 document.location.href = 'adminutama.php';
             </script>
          ";
    }
}



if (isset($_POST["edit_kegiatan"])){
 if(edit_data($_POST) > 0){
     echo"
          <script>
              alert('data berhasil ditambahkan');
              document.location.href = 'adminutama.php';
          </script>
      ";
 }else{
      echo"
          <script>
              alert('data gagal ditambahkan');
              document.location.href = 'adminutama.php';
          </script>
       ";
 }
}
$jmldataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM kegiatan"));
$jumlahhalaman = ceil($jumlahdata / $jmldataperhalaman);
$halamanaktif = (isset($_GET['halaman']) ? $_GET['halaman']: 1);
$awladata = ($jmldataperhalaman * $halamanaktif) - $jmldataperhalaman;


$kegiatan = query("SELECT * FROM kegiatan LIMIT $awladata,$jmldataperhalaman");

if(isset($_POST['cari'])){
    $kegiatan = boya($_POST["keyword"],$awladata,$jmldataperhalaman);
}else{
    $kegiatan = query("SELECT * FROM kegiatan LIMIT $awladata,$jmldataperhalaman");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</style>
<body>
<section class="">
        <nav class="navbar  navbar-expand-lg navbar-light bg-danger  ">
            <div class="container ">
                <div class="brand d-flex justify-content-between align-items-center">
                    <a href="adminutama.php" class="logo d-flex">
                        <img src="logo hmjti 1.png" alt="" class=" ">
                        <p class="ms-3  fw-bold text-light">Himpunan Mahasiswa Jurusan <br>Teknik
                            Informatika</p>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-ligth " id="navbarNav">
                    <ul class="nav navbar-nav ms-auto d-flex align-items-center ">
                        <li class="bar nav-item  ">
                            <a class="nav-link me-5 text-light " href="#kegiatan">Kegiatan</a>
                        </li>
                        <li class="bar nav-item">
                            <a class="link nav-link me-5 text-light " href="adminberita.php">Berita</a>
                        </li>
                        <li>
                            <a href="logout.php " style="background-color: white; color:red; padding:5px;text-decoration:none; border-radius:50px;font-weight:bold;">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section>
        <div class="isi">

            <h4 class="text-center mt-3" id="berita">Data Kegiatan Himpunan Mahasiswa Jurusan <br> Teknik Informatika</h4
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
            <h5 class="modal-title" id="exampleModalLabel">Kegiatan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="img" class="form-label ">GAMBAR</label>
                    <input type="file" name="img" class="form-control" id="img"
                        aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">NAMA KEGIATAN</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="desk" class="form-label">DESKRIPSI</label>
                    <input type="text" name="desk" class="form-control" id="desk">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="kegiatan" class="btn btn-dark">Kirim</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>



<div class="container d-flex justify-content-center ">

<table class="" border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>NO</th>
        <th>GAMBAR</th>
        <th>NAMA KEGIATAN</th>
        <th>DESKRIPSI</th>
        <th colspan="2" class="text-center">Aksi</th>
    </tr>

    <?php 
        $i = 1;
        foreach ($kegiatan as $hmj) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><img src=" img/<?= $hmj['img']; ?>" width="40px" alt=""></td>
        <td> <?= $hmj['nama']; ?></td>
        <td><?= $hmj['desk']; ?></td>
        <td>
<button type="button" class="btn btn-light" id="daftar" data-bs-toggle="modal" data-bs-target="#modal<?= $hmj['id']; ?>">
    ubah
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal<?= $hmj['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <?php 
                $id =  $hmj['id']; 
                $edit_kegiatan = query("SELECT * FROM kegiatan WHERE id = $id");
                ?>
            <input type="hidden" name="id" value="<?= $id;?>">

            <?php foreach ($edit_kegiatan as $edit_keg):?>
            <input type="hidden" name="imglama" value="<?= $edit_keg['img'];?>">

                <div class="mb-3">

                    <label for="img" class="form-label ">GAMBAR</label>
                    <input type="file" name="img" class="form-control" id="img"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">NAMA KEGIATAN</label>
                    <input type="text" name="nama" class="form-control"  value="<?= $edit_keg['nama'];?>" id="nama">
                </div>
                <div class="mb-3">
                    <label for="desk" class="form-label">DESKRIPSI</label>
                    <input type="text" name="desk" class="form-control" value="<?= $edit_keg['desk'];?>" id="desk">
                </div>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="edit_kegiatan" class="btn btn-dark">Kirim</button>
            </div>
            <?php endforeach ?>
        </form>
    </div>
</div>
</div>
            </td>
            <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $hmj['id'];?>">
                <button class="btn btn-dark text-light" type="submit" name="hapus">hapus</button>
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

<section class="bg-danger">
        <div>
            <div class="footer p-3 mt-5 ">
                <div class="bungkus text-center">
                    <div class="sosial">
                        <h3 class="">SOCIAL MEDIA</h3>
                        <div class="sosmed d-flex justify-content-center">
                            <h5><i class="bi bi-instagram me-3"></i></h5>
                            <h5><i class="bi bi-facebook"></i></h5>
                        </div>
                    </div>
                </div>
                <div class="sekret">
                    <p class="text-center px-5">Sekretariat : Gedung Sekretariat Fakultas Sains dan Teknologi Kampus II
                        UIN Alauddin Makassar – Samata (Gowa) <br> E Hp. 082 290 215 484, </p>
                </div>
            </div>
            <H4 class="text-center p-2 text-dark">Copyright &#169; inready 2021</H4>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>
</html>