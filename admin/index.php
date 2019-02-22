<?php
include 'header.php';
?>

<?php
$a = mysql_query("select * from tbl_barang_masuk");
?>

<div class="col-md-12" style="border:1px solid #c6fafb;padding:10px;background-color:#FFFF00;">
	<h3><strong> Selamat datang </h3></strong>
    <h4><strong> Aplikasi Pembelian Furniture </h4></strong>
</div>
<center><img src="foto/logo.png" width="200"></center>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php
include 'footer.php';

?>
