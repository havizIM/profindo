<?php 
include "koneksi.php";
$cari=$_GET['cari'];
header("location:tepung.php?cari=$cari");
?>