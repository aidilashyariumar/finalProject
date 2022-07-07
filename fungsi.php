<?php 
     $conn = mysqli_connect('localhost','root','','berkisar');
     if(mysqli_connect_errno()){
         echo "gagal" . mysqli_connect_error();
     }

     function tambah_data($data){
        global $conn;

        //tangkap data dari form dan masukan ke variabel

       
        $email = htmlspecialchars($data["email"]);
        $kritik = htmlspecialchars($data["kritik"]);
        $saran = htmlspecialchars($data["saran"]);
        $kategori = htmlspecialchars($data["kategori"]);
        $instansi = htmlspecialchars($data["instansi"]);
        
        $img = uploadimg();

        if(!isset($img)){
            return false;
        }

        //tambah file kedatabase
        mysqli_query($conn,"INSERT INTO aduan VALUES('','$email','$kritik','$saran','$kategori','$instansi','$img')");

        return mysqli_affected_rows($conn);
    }

  
    function query($query){

        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = []; 
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    // function registrasi($data){
    //     global $conn;

    //         $nama = stripslashes($data ["nama"]);
    //         $username = stripslashes($data["username"]);
    //         $password = ($data["password"]);
    //         $konfirmasi = ($data["konfirmasi"]);


    //         //cek username sudah ada atau blum
    //         $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    //         if (mysqli_fetch_assoc($result)){
    //             echo "
                
    //                 <script>
    //                 alert('username sudah terdaftar')
    //                 </script>";

    //                 return false;
    //         }

    //         if ($password !== $konfirmasi){
    //             echo "
    //             <script>
    //             alert('konfirmasi password tidak sesuai')
    //             </script>";

    //             return false;
    //         }

    //     }

    //         //registrasi
    //   function regis($data){
    //     global $conn;

    //     $nama = mysqli_real_escape_string($conn,stripslashes($data["nama"])) ;
    //     $email = mysqli_real_escape_string($conn,stripslashes($data["email"])) ;
    //     $password = mysqli_real_escape_string($conn, $data["password"]);
    //     $password2 = mysqli_real_escape_string($conn,$data["password2"]) ;
        
    //     //cek username sudah ada atau belum
    //     $result = mysqli_query($conn,"SELECT email FROM users WHERE email = '$email'");

    //     if(mysqli_fetch_assoc($result)){
    //         echo "
    //             <script>
    //                 alert('email sudah terdaftar')
    //             </script>
    //         ";

    //         return false;
    //     }

    //     //cek konfirmasi password
    //     if($password !== $password2){
    //         echo "
    //             <script>
    //                 alert('Konfirmasi Password tidak sesuai !!')
    //             </script>
    //         ";

    //         return false;
    //     }

    //     //enkripsi password
    //     $password = password_hash($password, PASSWORD_DEFAULT);

    //     //tambahkan user password ke database
    //     mysqli_query($conn, "INSERT INTO users VALUES('', '$nama', '$email', '$password')");

    //     return mysqli_affected_rows($conn);

    // }
    // function registrasi($data){
    //     global $conn;
    //     $nama = ($data["nama"]);
    //     $email = strtolower($data["email"]) ;
    //     $password = $data["password"];
    //     $password2 = $data["password2"];

    //     // Cek Konirmasi Password
    //     if($password !== $password2){
    //         echo "
    //         <script>
    //             alert('konfirmasi password tidak sesuai');
    //         </script>";

    //         return false;
    //     }
    // }

   

            // //enkripsi password
            // $password = password_hash($password, PASSWORD_DEFAULT);


            // //tambahkan user password ke database
            // mysqli_query($conn, "INSERT INTO users VALUES('','$nama','$username','$password')");

            // return mysqli_affected_rows($conn);
            
    
    function hapus_data($data) {
        global $conn;
        $id = $data['id'];
        mysqli_query($conn, "DELETE FROM aduan WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

   

   
   

    function edit_data($data){
        global $conn;

        $id = $data['id'];

       $imglama = $data["imglama"];

       if($_FILES['img']['error'] === 4){
           $img = $imglama;

       }else{
           $img = uploadimg();
       }
      
       $email = htmlspecialchars($data["email"]);
       $kritik = htmlspecialchars($data["kritik"]);
       $saran = htmlspecialchars($data["saran"]);
       $kategori = htmlspecialchars($data["kategori"]);
       $instansi = htmlspecialchars($data["instansi"]);

    


        //update 
        $query = "UPDATE aduan SET
                email = '$email',
                kritik = '$kritik',
                saran= '$saran',
                kategori = '$kategori',
                instansi= '$instansi',
                img= '$img'
                WHERE id = $id";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function uploadimg(){

        $nameFile = $_FILES['img']['name'];
        // $ukuranFile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpName = $_FILES['img'] ['tmp_name'];

        //cek apakah tidak ada foto yang diupload
        if ($error === 4){
            echo "<script>
                    alert('pilih foto terlebih dahulu');
                    </script>";

                    return false;
        }

        //pastikan yang diupload adalah foto

        $ekstensiGambarValid = ['jpeg','jpg','png'];
        $ekstensiGambar = explode('.',$nameFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            echo"<script>
                    alert('yang diupload bukan gambar !');
                </script>";

            return false;
        }

        //cek jika ukuran terlalu besar
        //if ($ukuranFile > 2500000){
            //echo"<script>
                //alert('ukuran gambar terlalu besar);
                //</script>";

          //  return false;
        //}

        //lolos pengecekan , gambar siap diupload
        //ubah nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function cari($keyword){
        $query = "SELECT * FROM aduan WHERE nama LIKE '%$keyword%' OR desk LIKE '%$keyword%'";
        

        return query($query);
    }
    

?>