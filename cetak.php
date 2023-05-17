<?php
require_once("koneksi.php");

$no = 1;
$query = "SELECT * FROM pengguna";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    // Membuat header tabel
    $header = array("Nomor", "NIM", "Nama", "Dosen", "Status", "Keterangan");
    
    // Membuat data tabel
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            $no++,
            $row['NIM'],
            $row['NAMA'],
            $row['DOSEN'],
            $row['STATUS'],
            $row['KETERANGAN']
        );
    }
    
    // Menggabungkan header dan data tabel
    $table = array($header);
    $table = array_merge($table, $data);
    
    // Mencetak tabel menggunakan HTML
    echo "<table border='1'>";
    foreach ($table as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>$cell</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

mysqli_close($koneksi);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
</style>

</head>
<body>
</body>
</html>