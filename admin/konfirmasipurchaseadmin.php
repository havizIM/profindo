<?php
include 'koneksi.php';
mysql_query("UPDATE request SET status='Telah di Konfirmasi Admin' WHERE no_faktur='$_GET[id]'");
header("location:purchasemasukadmin.php");

?>
