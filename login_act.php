<?php
session_start();
include 'admin/koneksi.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=$pass;
$query=mysql_query("SELECT * FROM tbl_user WHERE uname='$uname' and pass='$pas'")or die(mysql_error());
if(mysql_num_rows($query)==1){
$data = mysql_fetch_array($query);
	$_SESSION['uname']=$uname;
	 $_SESSION['level']=$data['level'];
	 $_SESSION['nama']=$data['nama'];
	 $_SESSION['id']=$data['id'];
	header("location:admin/index.php");
}else{
	header("location:index.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}
// echo $pas;
 ?>
