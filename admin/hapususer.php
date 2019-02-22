<?php
include 'koneksi.php';
mysql_query("delete from tbl_user where id='$_GET[id]'");
header("location:user.php");

?>
