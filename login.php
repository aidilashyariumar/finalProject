<?php

    
if(isset($_SESSION["log"]) === true){
    header('location:admin.php');
}

    if(isset($_POST["log"])){
        session_start();
        $_SESSION["userweb"] ="";
        include 'fungsi.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        


        $result = mysqli_query($conn,"SELECT * FROM adminn WHERE username = '$username' AND password = md5('password')");
        $cek= mysqli_num_rows($result);
        //cek username
        if($result==1){
            $_SESSION['userweb'] = $username;
            header('location:admin.php');
            
        }else{
            echo"Maaf username dan password salah!";
        }
    //     if(mysqli_num_rows($result) > 0){
    //         echo"
    //         <script>
    //         window.location='adminutama.php';
    //         </script>";
    //     }
    //     $error = true;
    // }
    }
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
    .container1 {
        width: 400px;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
    }
    .seluruh{
        margin-top: 100px;
    }
</style>

<body>

    <section class="seluruh d-flex justify-content-evenly align-items-center">
        <div class="bungkus">
            <div class="logo d-flex a">
                <img src="./img/Group 8.png" alt="" style="width: 150px;">
                <h1 class="fw-bold mt-4 ms-2">Beri Kritik Dan Saran</h1>
            </div>
            <div class="text">
                <h3 class="mt-3">
                    Silahkan login untuk masuk keadmin! <br> Salam Informatika , Jaya Informatika.
                </h3>
            </div>
        </div>

        <div class="container1 shadow">
            <form action="" method="post">
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <a href="admin.php"></a><button type="submit" name="log" class="btn btn-danger">Login</button>
            </form>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>