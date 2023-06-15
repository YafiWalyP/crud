<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="stylecreate.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Data</title>
</head>
<body>
    <form action="create.php" method="post" enctype="multipart/form-data">   
        <label for="nama">Masukkan Nama</label>
        <input type="text" name="nama">

        <label for="alamat">Masukkan Alamat</label>
        <input type="text" name="alamat">

        <label for="foto">Masukkan foto</label>
        <input type="file" name="foto">
        
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    include "koneksi.php";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $folder = "./foto/";
    $nama_foto = $_FILES['foto']['name'];
    $tempat_foto = $_FILES ['foto']['tmp_name'];

    move_uploaded_file($tempat_foto, $folder. $nama_foto);
    $data =mysqli_query($koneksi,
    "INSERT INTO `daftar_siswa`(`Foto`, `id`, `nama`, `alamat`) VALUES ('$nama_foto','','$nama','$alamat')");

    header("Location: index.php");}
?>