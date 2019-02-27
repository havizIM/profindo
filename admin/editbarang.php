<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$det=mysql_query("select * from tbl_barang where kd_barang='$_GET[id]'");
$d=mysql_fetch_array($det);
?>
	<form action="" method="post">
		<table class="table">
			<tr>
				<td>Nama Barang</td>
				<td><input type="text" class="form-control" name="nama_barang" value="<?php echo $d['nama_barang'] ?>"></td>
			</tr>
			<tr>
				<td>Satuan</td>
				<td><input type="text" class="form-control" name="satuan" value="<?php echo $d['satuan'] ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="simpan" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>

<?php
include 'koneksi.php';
if(isset($_POST["simpan"])){
$nama		= $_POST['nama_barang'];
$satuan     = $_POST['satuan'];
$harga		= $_POST['harga'];

mysql_query("update tbl_barang set nama_barang='$nama', satuan='$satuan', harga='$harga' where kd_barang='$_GET[id]'");
echo "<script>window.location='barang.php';</script>";
}
?>

<?php include 'footer.php'; ?>
