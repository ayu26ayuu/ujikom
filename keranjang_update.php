<?php
include 'koneksi.php';
session_start();

$qty = $_POST['qty'];
//print_r($qty);

forech ($_SESSION['cart'] as $key => $value){
    $_SESSION['cart'][$key]['qty'] = $qty[$key];
}
header('location:kasir.php');
?>