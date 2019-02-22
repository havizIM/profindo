<?php 
include 'koneksi.php';
mysql_query("delete from tbl_barang where kd_barang='$_GET[id]'");
header("location:barang.php");

?>