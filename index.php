<?php
include "koneksi.php";

$data =mysqli_query($koneksi,
    "SELECT * FROM `daftar_siswa` ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Siswa<h1>
        <a class = 'create' href="create.php">Buat Data Baru</a>
        <table border="1">
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th colspan="3">Aksi</th>
            </tr>
            <?php
        while ($data_siswa =mysqli_fetch_array($data)) {
            echo "<tr>";
            echo "<td class='foto'><img src='foto/".$data_siswa['foto'] ."' width='200px' height='200px'></td>";
            echo "<td>".$data_siswa['nama']."</td>";
            echo "<td>".$data_siswa['alamat']."</td>";
            echo "<td><a class = 'rincian' href='rincian.php?id=$data_siswa[id]'>rincian</a></td>";
            echo "<td><a class = 'update' href='update.php?id=$data_siswa[id]'>update</a></td>";
            echo "<td><a class = 'delete' href='delete.php?id=$data_siswa[id]'>delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a class = 'logout' href="login.php">Log Out</a>
    
</body>
</html>