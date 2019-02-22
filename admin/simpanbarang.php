<?php


$nama		= $_POST['nama_barang'];
$satuan     = $_POST['satuan'];
$supplier		= $_POST['supplier'];
$harga		= $_POST['harga'];


	if(! empty($nama)){
	include "koneksi.php";	//koneksi ke server database
		//Query Untuk Insert Data
		$sqlsimpan	= "insert into tbl_barang values(
                       '',
					   '$nama',
					   '$satuan',
						 '$harga',
						 '$supplier',
					   '$jml'
					   )";
	   $querysimpan	= mysql_query($sqlsimpan);

		echo "<script type='text/javascript'>
			alert('Data Berhasil Disimpan...!!!');window.location.href='barang.php';
		</script>";

	}
	else
	{
		echo "<script type='text/javascript'>
		alert('Data Gagal Disimpan...!!!');window.location.href='barang.php';
		</script>";
	}
?>
