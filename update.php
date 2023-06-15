<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];
    $folder = "./foto/";
    $nama_foto = $_FILES['foto']['name'];
    $tempat_foto = $_FILES['foto']['tmp_name'];

    if ($nama_foto != "") {
        // Jika foto di-upload, hapus foto lama dan upload foto baru
        unlink($folder.$foto);
        move_uploaded_file($tempat_foto, $folder.$nama_foto);
    } else {
        // Jika foto tidak di-upload, gunakan foto lama
        $nama_foto = $foto;
    }

    $update = mysqli_query($koneksi,
        "UPDATE `daftar_siswa` SET `Foto`='$nama_foto', `nama`='$nama', `alamat`='$alamat' WHERE `id`='$id'");

    if($update){
        header("Location: index.php");
    } else{
        echo "Gagal update data.";
    }
} else {
    $id = $_GET['id'];
    $data_siswa = mysqli_query($koneksi,
        "SELECT * FROM `daftar_siswa` WHERE `id`='$id'");
    $row = mysqli_fetch_array($data_siswa);
    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $foto = $row['foto'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styleupdate.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>">

        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>">

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="<?php echo $alamat; ?>">

        <label for="foto">Foto</label>
        <input type="file" name="foto">

        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php
}
mysqli_close($koneksi);
?>
