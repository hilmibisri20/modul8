<?php

require_once("koneksi.php");

function register($name, $username, $email, $password) {
    global $koneksi;

    // Melakukan sanitasi input untuk mencegah SQL injection
    $name = mysqli_real_escape_string($koneksi, $name);
    $username = mysqli_real_escape_string($koneksi, $username);
    $email = mysqli_real_escape_string($koneksi, $email);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Query untuk memeriksa apakah username atau email sudah digunakan sebelumnya
    $cekQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $cekResult = mysqli_query($koneksi, $cekQuery);

    // Memeriksa jumlah baris yang terpengaruh oleh query
    $cekcount = mysqli_num_rows($cekResult);
    if ($cekcount > 0) {
        return false;
    }

    // Query untuk menambahkan pengguna baru ke dalam tabel pengguna
    $tambahquery = "INSERT INTO users (name, username, email, password) 
                VALUES ('$name', '$username', '$email', '$password')";
    $tambahresult = mysqli_query($koneksi, $tambahquery);

    // Jika registrasi berhasil, kembalikan true
    if ($tambahresult) {
        return true;
    } else {
        return false;
    }
}

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (register($name, $username, $email, $password)) {
        // Redirect ke halaman login.php jika register berhasil
        echo "<script> alert('Register Berhasil');
                document.location.href='login.php';
                </script>";
        exit();
    } else {
        // Notifikasi register gagal
        echo "<script> alert('Username atau Email sudah digunakan');
                document.location.href='register.php';
                </script>";
    }
}
mysqli_close($koneksi);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <!-- <div class="card" style="width: 18rem;"> -->
    <div class="col d-flex justify-content-center">
    <div class="card" style="width: 700px; height: 450px; top: 15vw; border-radius: 10px; box-shadow: 0px 3px 20px rgba(0,0,0,0.3)">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center; color: blue; font-size: 2vw;">REGISTER</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary" style="text-align: center;">Registrasi Username dan Password</h6>
          <p class="card-text"> <form action="" method="POST">
            <div class="mb-4">
                
                <input class="form-control" type="text" name="name" placeholder="Nama" />
            </div>
            <div class="mb-4">
                
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>
            <div class="mb-4">
                
                <input class="form-control" type="email" name="email" placeholder="Email" />
            </div>
            <div class="mb-4">
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
            </p>
          
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" style="border-radius: 10px;" name="register" value="Daftar" > </button>
            </div> 
            <br>
            <p class="card-text" style="text-align: center;">Sudah punya akun? <a href="login.php" class="card-link" style="text-decoration: none; color: #686868;">Click Disini!</a> </p> </form>
        </div>
    </div>






    </div>
    
      
</body>
</html>