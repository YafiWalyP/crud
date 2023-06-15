<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="stylelogin.css">
    <title>Halaman Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit" name="login">Login</button>

        <p>Bikin Akun?<a href="register.php"> Pencet Saya</a></p>
    </form>
</body>
</html>

<?php
    include "koneksi.php";

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM registrasi_data WHERE username='$username'");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                echo "Login berhasil!";

                header("location: index.php");
                // Lakukan aksi sesuai dengan login yang berhasil
            } else {
                echo "Username atau password salah!";
            }
        } else {
            echo "Username atau password salah!";
        }
    }
?>