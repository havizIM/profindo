<?php 
include 'koneksi.php';
$id			= $_GET['id'];
mysql_query("update tbl_barang_keluar set status='Y' where kd_barangkeluar='$_GET[id]'");
echo "<script type='text/javascript'>
			alert('Berhasil Di Konfirmasi');window.location.href='barangkeluar.php';
		</script>";

?>	
