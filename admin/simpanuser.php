<?php
$nama		= $_POST['nama'];
$username    = $_POST['username'];
$password		= $_POST['password'];
$level	= $_POST['level'];

	if(! empty($nama)){
	include "koneksi.php";	//koneksi ke server database
		//Query Untuk Insert Data
		$sqlsimpan	= "INSERT INTO tbl_user VALUES(
                       '',
					   '$username',
					   '$password','$nama','$level'
					   )";
	   $querysimpan	= mysql_query($sqlsimpan);

		echo "<script type='text/javascript'>
			alert('Data Berhasil Disimpan...!!!');window.location.href='user.php';
		</script>";

	}
	else
	{
		echo "<script type='text/javascript'>
		alert('Data Gagal Disimpan...!!!');window.location.href='user.php';
		</script>";
	}
?>
