<?php
$host = 'localhost'; 
$db = 'looksee'; 
$user = 'root'; 
$pass = ''; 

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>