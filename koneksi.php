<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'yaallah';

$koneksi = new mysqli("$host", "$user", "$pass", "$db");

if ($koneksi-> connect_error) {
    echo 'Koneksi gagal -> ' . $koneksi->connect_error;
}
?>
