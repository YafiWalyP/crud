<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "crud1";

$koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$koneksi) {
    die("gagal lur!: " . mysqli_connect_error ());
}

// echo "berhasil lur!"

?>