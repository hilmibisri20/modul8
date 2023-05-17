<?php
require("koneksi.php");

if(isset($_POST['submit'])) {
    $NIM = $_POST['nim'];
    $NAMA = $_POST['nama'];
    $DOSEN = $_POST['dosen'];
    $STATUS = $_POST['status'];
    $KETERANGAN = $_POST['keterangan'];
    $query = "INSERT INTO pengguna (Nomor, NIM, NAMA, DOSEN, STATUS, KETERANGAN) VALUES (NULL, '$NIM', '$NAMA', '$DOSEN', '$STATUS', '$KETERANGAN')";
    $result = mysqli_query($koneksi, $query);
    
    if ($result) {
      echo "<script> alert('Tambah data berhasil');
      document.location.href='dashboard.php';
      </script>";
        exit;
    } else {
      echo "<script> alert('Username atau Password salah');
      document.location.href='tambah.php';
      </script>";
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>


<form method="post" action="">
  
  <input type="hidden" name="id" value=""><br><br>
  <label for="nim">NIM:</label>
  <input type="text" id="nim" name="nim" value=""><br><br>
  <label for="nama">Nama:</label>
  <input type="text" id="nama" name="nama" value=""><br><br>
  <label for="dosen">Dosen:</label>
  <input type="text" id="dosen" name="dosen" value=""><br><br>
  <label for="status">Status:</label>
  <input type="radio" id="status" name="status" value="HADIR">
  <label for="html">HADIR</label>
  <input type="radio" id="status" name="status" value="ALPHA">
  <label for="css">ALPHA</label>
  <input type="radio" id="status" name="status" value="SAKIT">
  <label for="css">SAKIT</label>
  <br><br>
  <label for="keterangan">Keterangan:</label>
  <input type="radio" id="keterangan" name="keterangan" value="ASPRAK">
  <label for="html">ASPRAK</label>
  <input type="radio" id="keterangan" name="keterangan" value="PRAKTIKAN">
  <label for="css">PRAKTIKAN</label><br><br>
  <input type="submit" name="submit" value="submit">
</form>
