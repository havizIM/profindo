<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Supplier</h3>
<a class="btn" href="daftar_supp.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$det=mysql_query("select * from tbl_supplier where id_supplier='$_GET[id]'");
$d=mysql_fetch_array($det);
?>
	<form action="" method="post">
		<table class="table">
			<tr>
				<td>Nama Supplier</td>
				<td><input type="text" class="form-control" name="nama_supplier" value="<?php echo $d['nama_supplier'] ?>"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="number" class="form-control" name="telepon" value="<?php echo $d['telepon'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
        <td>
          <textarea name="alamat" class="form-control" rows="8" cols="80"><?php echo $d['alamat'] ?></textarea>
        </td>
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
$nama		= $_POST['nama_supplier'];
$telepon     = $_POST['telepon'];
$alamat		= $_POST['alamat'];

mysql_query("update tbl_supplier set nama_supplier='$nama', telepon='$telepon', alamat='$alamat' where id_supplier='$_GET[id]'");
echo "<script>window.location='daftar_supp.php';</script>";
}
?>

<?php include 'footer.php'; ?>
