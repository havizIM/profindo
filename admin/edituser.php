<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data User</h3>
<a class="btn" href="user.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$det=mysql_query("select * from tbl_user where id='$_GET[id]'");
$d=mysql_fetch_array($det);
?>
	<form action="" method="post">
		<table class="table">
			<tr>
				<td>Username</td>
				<td><input type="text" class="form-control" name="username" value="<?php echo $d['uname'] ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" class="form-control" name="password" value="<?php echo $d['pass'] ?>"></td>
			</tr>

			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><select name="level" class="form-control">
					<?php
						if($d['level']=='admin'){ ?>
							<option value="admin" selected>Admin</option>
							<option value="supplier">Supplier</option>
							<option value="accounting">Accounting</option>
							<option value="supervisor">Supervisor</option>
							<option value="manajerkeuangan">Manajer Keuangan</option>
					<?php
					}else if($d['level']=='supplier'){ ?>
						<option value="admin">Admin</option>
						<option value="supplier" selected>Supplier</option>
						<option value="accounting">Accounting</option>
						<option value="supervisor">Supervisor</option>
						<option value="manajerkeuangan">Manajer Keuangan</option>
					<?php
					}else if($d['level']=='accounting'){ ?>
						<option value="admin">Admin</option>
						<option value="supplier">Supplier</option>
						<option value="accounting" selected>Accounting</option>
						<option value="supervisor">Supervisor</option>
						<option value="manajerkeuangan">Manajer Keuangan</option>
					<?php
					}else if($d['level']=='supervisor'){ ?>
						<option value="admin">Admin</option>
						<option value="supplier">Supplier</option>
						<option value="accounting">Accounting</option>
						<option value="supervisor" selected>Supervisor</option>
						<option value="manajerkeuangan">Manajer Keuangan</option>
					<?php
					}else if($d['level']=='manajerkeuangan'){ ?>
						<option value="admin">Admin</option>
						<option value="supplier">Supplier</option>
						<option value="accounting">Accounting</option>
						<option value="supervisor">Supervisor</option>
						<option value="manajerkeuangan" selected>Manajer Keuangan</option>
					<?php } ?>
					</select>
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

$password		= $_POST['username'];
$username			= $_POST['password'];
$nama			= $_POST['nama'];
$level			= $_POST['level'];
mysql_query("UPDATE tbl_user SET uname='$username', pass='$password', nama='$nama', level='$level'  WHERE id='$_GET[id]'");
echo "<script>window.location='user.php';</script>";
}
?>

<?php include 'footer.php'; ?>
