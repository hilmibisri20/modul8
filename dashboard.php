<?php
require("koneksi.php");
//ngentot
$query = "SELECT * FROM pengguna";
$result = mysqli_query($koneksi, $query);
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>butstrep</title>
</head>
<body style="background-color: rgb(214, 214, 214);">
    <nav class="navbar bg-body-tertiary fixed-top"><br>
        <div class="container-fluid" style="background-color: rgb(84, 165, 227); padding: 20px; position: fixed; margin-top: 50px; margin-bottom: 20px;">
          <a class="navbar-brand" href="#" style="color: white;"><span style="color: white;padding-right: 20px; font-family: impact; font-size: 30px;  ">Dashboard</span> Selamat Datang, admin</a>
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
      <br>
      <div class="card" style="width: 96%; height: auto; left: 2%; right: 2%; border-radius: 10px; box-shadow: 0px 3px 20px rgba(0,0,0,0.3)">
        <div class="card-body">
        <div class="p">
                <a href = "tambah.php"><button type="button" class="btn btn-success btn-sm" style="width: 200px;height: 40px;margin-top: 10px;margin-bottom: 10px; background-color: #72FF70;">Tambah Data</button></a>
                <button type="button" class="btn btn-danger btn-sm" style="width: 200px;height: 40px;margin-top: 10px;margin-bottom: 10px; background-color: #FF4343;" > <a href="cetak.php" style="color: white; text-decoration: none;">  Cetak Laporan </a> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                  <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                </svg></i></button>
              <form method="POST" class="d-flex" action="cari.php" role="search" style="float: right;margin-top: 10px;margin-bottom: 10px;">
                <input class="form-control me-2" name="keyword" type="search" placeholder="Cari Berdasarkan NIM" aria-label="Search" style="background-color: rgb(246, 238, 238);">
                <input class="btn btn-outline-success" type="submit" name="cari" value=""><a href=""><i data-feather="search"></i></a></button>
              </form>
            </div>
          <br>
          <table class="table">
            <thead style="background-color:#98CDFE;
            ;">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">NIM</th>
                <th scope="col">NAMA</th>
                <th scope="col">DOSEN</th>
                <th scope="col">STATUS</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result) {
                if (mysqli_num_rows($result) > 0) {

                  while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo "<td>".$row['NIM']."</td>";
                echo "<td>".$row['NAMA']."</td>";
                echo "<td>".$row['DOSEN']."</td>";
                echo "<td>".$row['STATUS']."</td>";
                echo "<td>".$row['KETERANGAN']."</td>";
                echo "<td>";
                echo "<a href='edit.php?id=".$row['Nomor']."' class='btn btn-primary' style='background-color: #87A9FF;'>EDIT</a> ";
                echo "<a href='hapus.php?id=".$row['Nomor']."' class='btn btn-primary' style='background-color: #FF5E5E;'>HAPUS</a>";
                echo "</td>";
                echo "</tr>";
             } } else {
                  echo "Tidak ada pengguna yang ditemukan.";
                  }
               } else {
                  echo "Terjadi kesalahan dalam menjalankan query.";
              }
              
              // Menutup koneksi
              mysqli_close($koneksi);
      ?>
              <!-- <tr>
                <th scope="row">1</th>
                <td>220441100156</td>
                <td>MOHAMMAD HILMI BISRI</td>
                <td>SRI HERAWATI</td>
                <td>PRAKTIKAN</td>
                <td>HADIR</td>
                <td>
                    <button class="btn btn-primary" type="submit" style="background-color: #87A9FF;">EDIT</button>
                    <button class="btn btn-primary" type="submit" style="background-color: #FF5E5E;">HAPUS</button>
                </td> -->
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
  ></script>
</body>
</html>