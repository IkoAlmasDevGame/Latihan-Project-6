<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$user = "root";
$pass = "";
$db = "db_toko2";

try {
    $configs = new PDO("mysql:host=localhost; dbname=$db;", $user, $pass);
}catch(Exception $e){
    echo "error : ". $e->getMessage();
}

/* Controller */ 
$barang = "../controller/barang.php";
$kategori = "../controller/kategori.php";
$payment = "../controller/payment.php";
$profile = "../controller/profile.php";
$laporan = "../controller/laporan.php";
$histori = "../controller/histori.php";
?>