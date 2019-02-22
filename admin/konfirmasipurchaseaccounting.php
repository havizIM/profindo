<?php
include 'koneksi.php';
mysql_query("UPDATE request SET status='Telah di Konfirmasi Accounting' WHERE no_faktur='$_GET[id]'");
header("location:purchasemasukaccounting.php");

?>
