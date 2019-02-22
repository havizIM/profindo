<?php
include 'koneksi.php';
mysql_query("UPDATE request SET status='Barang Telah di Terima',no_invoice='$_POST[no_invoice]',tgl_inv='$_POST[tgl_inv]' WHERE no_faktur='$_GET[id]'");
header("location:purchasemasukaccounting.php");

?>
