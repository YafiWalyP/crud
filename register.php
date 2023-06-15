<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styleregistrasi.css">
    <title>Halaman Registrasi</title>
</head>
<body>
    <h2>Registrasi Pengguna Baru</h2>
    <form action="" method="post">
        <label for="username">username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button name="Sign_up">Registrasi</button>
    </form>
</body>
</html>

<?php
    include "koneksi.php";

    if (isset($_POST['Sign_up'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $data = mysqli_query($koneksi,"INSERT INTO registrasi_data VALUES('','$username','$email','$password')");
        header("location: index.php");
if (!isset($_POST['email']) && !isset($_POST['username']) && !isset($_POST['password'])) {
            echo "Mohon Isi Semua Terlebih Dahulu";
        }
    }
?>
        