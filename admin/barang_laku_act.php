<?php 

include 'koneksi.php';
$tgl=$_POST['tgl'];
$nama=$_POST['nama'];
$kode=$_POST['nim'];
$jumlah=$_POST['jumlah'];
$harga=$_POST['jrsn'];

$dt=mysql_query("select * from barang where kode_brg='$kode'");
$data=mysql_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysql_query("update barang set jumlah='$sisa' where kode_brg='$kode'");

$totalharga=$harga*$jumlah;
mysql_query("insert into transaksi values('','$nama','$tgl','$kode','$jumlah')")or die(mysql_error());
mysql_query("insert into tb_kas values('','Penjualan','Pendapatan','$tgl', '$totalharga','')") or die (mysql_error());

header("location:permintaan_tepung.php");

?>