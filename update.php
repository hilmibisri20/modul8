<?php
//koneksi database
require_once "koneksi.php";

//mengambil data yang di-post dari form
$no = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$dosen = $_POST['dosen'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];

//query update data
$query = "UPDATE pengguna SET NIM='$nim', NAMA='$nama', DOSEN='$dosen', STATUS='$status', KETERANGAN='$keterangan' WHERE Nomor='$no'";
$update = mysqli_query($koneksi, $query);

if ($update) {
    //redirect ke halaman dashboard.php setelah update berhasil
    header("Location: dashboard.php");
    exit;
} else {
    echo "Update gagal.";
}

//menutup koneksi
mysqli_close($koneksi);
?>
