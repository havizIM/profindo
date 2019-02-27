<?php
include 'koneksi.php';
mysql_query("delete from tbl_supplier where id_supplier='$_GET[id]'");
header("location:daftar_supp.php");

?>
