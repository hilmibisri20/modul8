<?php
session_start();
require("koneksi.php");
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$namaPengguna = $_SESSION['username'];
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">

    <title>butstrep</title>
</head>
<body style="background-color: rgb(214, 214, 214);">
<nav class="navbar bg-body-tertiary fixed-top"><br>
        <div class="container-fluid" style="background-color: rgb(84, 165, 227); padding: 20px; position: fixed; margin-top: 50px; margin-bottom: 20px;">
          <a class="navbar-brand" href="#" style="color: white;"><span style="color: white;padding-right: 20px; font-family: impact; font-size: 30px;  ">Dashboard</span> Selamat Datang, <?php echo $namaPengguna ?> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="color: white;">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                Dashboard
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="color: white;">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="color: white;">
                <li class="nav-item" style="color: white;">
                  <a class="nav-link active" aria-current="page" href="home.php" style="font-weight: bold;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="dashboard.php">Informasi Pengguna</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Informasi statistik</a>
                  </li><li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Settings</a>
                  </li><li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Akun</a>
                  </li><li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Kalender</a>
                  </li><li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Daftarkan Tim</a>
                  </li>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  <button type="button" class="btn btn-info"> <a href="login.php" style="color: white; text-decoration: none;"> logout</a> </button>
                </ul>
                <div>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <h1 style="text-align: center; color: rgb(54, 51, 51); padding-top: 140px;"><b>Informasi</b></h1>
      <h1 style="text-align: center; color: rgb(54, 51, 51);"><b>Pengguna E-Commerce</b></h1>
      

<div class="container">
    <div class="row">
        <div class="col-4">
        <div class="card " style="width: 100%;">
            <img src="User.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" style="font-size: 25px; font-weight: bolder;">First User</h5>
              <small>$100</small>
              <p class="card-text">Pengguna ini mempunyai riwayat pembelian barang sebesar $100 Dollar</p>
          
            </div>
        </div>
      </div>
      <div class="col-4 ">
          <div class="card " style="width: 100%;">
              <img src="User.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" style="font-size: 25px; font-weight: bolder;">Second User</h5>
                <small>$300</small>
                <p class="card-text">Pengguna ini mempunyai riwayat pembelian barang sebesar $300 Dollar</p>
            
              </div>
            </div>
          </div>
          <div class="col-4">
              <div class="card " style="width: 100%;">
                  <img src="User.png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title" style="font-size: 25px; font-weight: bolder;">Third User</h5>
                      <small>$400</small>
                      <p class="card-text">Pengguna ini mempunyai riwayat pembelian barang sebesar $400 Dollar</p>
                     
                  </div>
                  </div>
              </div>
          </div>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
  ></script>
</body>
</html>