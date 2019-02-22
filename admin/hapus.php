<?php 
include 'koneksi.php';
$id=$_GET['id'];
mysql_query("delete from barang where id='$id'");
header("location:tepung.php");

?>