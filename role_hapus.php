
<?php

include 'koneksi.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];

	mysqli_query($koneksi, "DELETE FROM `role` WHERE id_role='$id' ");

	$_SESSION['success'] = 'Berhasil menghapus data';

	header('location: index.php');
}

?>