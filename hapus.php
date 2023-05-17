<?php
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $query = "DELETE FROM pengguna WHERE Nomor=?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Data tidak ditemukan.";
        }
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    header("Location: dashboard.php");
    exit;
}

mysqli_close($koneksi);
?>
