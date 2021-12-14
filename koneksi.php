<?php

$server     = "localhost";
$username   = "root";
$password   = "";
$db         = "25_mywebsite_12rpl2";

$koneksi = mysqli_connect($server, $username, $password, $db);

if (!$koneksi) {
    die("koneksi gagal </h2><br>".mysqli_connect_eror()."<br>".mysqli_connect_errno());
} 
// else{
//     echo "Koneksi Berhasil"


?>