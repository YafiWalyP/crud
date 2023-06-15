<?php
include "koneksi.php";

$id = $_GET['id'];
$data_siswa = mysqli_query($koneksi,
    "SELECT * FROM `daftar_siswa` WHERE `id`='$id'");
$row = mysqli_fetch_array($data_siswa);
$id = $row['id'];
$nama = $row['nama'];
$alamat = $row['alamat'];
$foto = $row['foto'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="stylerincian.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Data Siswa</title>
</head>
<body>
    <h1>Rincian Data Siswa</h1>
    <a href="index.php">Kembali</a>
    <table border="1">
        <tr>
            <td>ID:</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>Foto:</td>
            <td><img src="foto/<?php echo $foto;?>" width="200px" height="200px"></td>
        </tr>
        <tr>
            <td>Nama:</td>
            <td><?php echo $nama;?></td>
        </tr>
        <tr>
            <td>Alamat:</td>
            <td><?php echo $alamat;?></td>
        </tr>
    </table>
</body>
</html>