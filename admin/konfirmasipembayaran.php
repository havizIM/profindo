<?php
include 'koneksi.php';
mysql_query("UPDATE request SET status='Transaksi Sukses' WHERE no_faktur='$_GET[id]'");
header("location:purchasemasukaccounting.php");

?>
