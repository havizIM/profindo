<?php


$nama		= $_POST['nama_supplier'];
$telepon     = $_POST['telepon'];
$alamat		= $_POST['alamat'];


	if(! empty($nama)){
	include "koneksi.php";	//koneksi ke server database
		//Query Untuk Insert Data
		$sqlsimpan	= "insert into tbl_supplier values(
                       '',
					   '$nama',
					   '$telepon',
						 '$alamat'
					   )";
	   $querysimpan	= mysql_query($sqlsimpan);

		echo "<script type='text/javascript'>
			alert('Data Berhasil Disimpan...!!!');window.location.href='daftar_supp.php';
		</script>";

	}
	else
	{
		echo "<script type='text/javascript'>
		alert('Data Gagal Disimpan...!!!');window.location.href='daftar_supp.php';
		</script>";
	}
?>
