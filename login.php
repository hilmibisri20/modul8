<?php
require_once 'koneksi.php';

// Fungsi untuk melakukan login

function login($username, $password) {
    global $koneksi;

    // Melakukan sanitasi input untuk mencegah SQL injection
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Query untuk memeriksa kecocokan username dan password di tabel pengguna
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa jumlah baris yang terpengaruh oleh query
    $count = mysqli_num_rows($result);

    // Jika ada pengguna dengan username dan password yang sesuai, kembalikan true
    if ($count == 1) {
        return true;
    } else {
        return false;
    }
}

// Menangkap nilai submit dari form login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = login($username, $password);
// Memeriksa apakah login berhasil
if ($login == true) {
    // Jika login berhasil, alihkan ke halaman home.php
    session_start();
    $_SESSION['username'] = $username;
    echo "<script> alert('Login Berhasil');
            document.location.href='home.php';
            </script>";
    // header("Location: home.php");
    exit();
} else {
    // Jika login gagal, tampilkan pesan error
    echo "<script> alert('Username atau Password salah');
            document.location.href='login.php';
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <!-- <div class="card" style="width: 18rem;"> -->
    <div class="col d-flex justify-content-center">
    <div class="card" style="width: 700px; height: 450px; top: 15vw; border-radius: 10px; box-shadow: 0px 3px 20px rgba(0,0,0,0.3)">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center; color: blue; font-size: 2vw;">LOGIN</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary" style="text-align: center;">Masukan Username dan Password</h6>
          <p class="card-text"> <form action="" method="POST">
            <div class="mb-3">
               
                <input class="form-control" type="text" name="username" placeholder="Username atau email" />
            </div>
            <div class="mb-3">
               
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
            <br>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Biarkan saya Masuk</label>
            </div>
            <br>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary btn-block" name="login" value="Masuk" style="border-radius: 10px;" />

            </div>
            <br>
           </p>
          <p class="card-text" style="text-align: center;">Belum punya akun? <a href="register.php" class="card-link" style="text-decoration: none; color: #686868;">Click Disini!</a> </p> </form>
        </div>
    </div>
      
</body>
</html>