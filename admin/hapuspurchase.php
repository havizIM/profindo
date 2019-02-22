<?php
include 'koneksi.php';
mysql_query("DELETE FROM request WHERE no_faktur='$_GET[id]'");
mysql_query("DELETE FROM detail_request WHERE no_faktur='$_GET[id]'");
header("location:purchase.php");

?>
