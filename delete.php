<?php
include "koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_siswa = mysqli_query($koneksi,
        "SELECT `Foto` FROM `daftar_siswa` WHERE `id`='$id'");
    $row = mysqli_fetch_array($data_siswa);
    $foto = $row['Foto'];

    // hapus foto dari folder
    unlink("./foto/" . $foto);

    // hapus data dari tabel
    $delete = mysqli_query($koneksi,
        "DELETE FROM `daftar_siswa` WHERE `id`='$id'");

    if($delete){
        header("Location: index.php");
    } else{
        echo "Gagal hapus data.";
    }
}
?>
