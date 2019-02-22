<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data User</strong></h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah User</button>
<br/>


<div class="col-md-12">

</div>
<br/>
<br/>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-2">Username</th>
		<th class="col-md-2">Password</th>
		<th class="col-md-2">Nama Lengkap</th>
		<th class="col-md-2">Level</th>
		<th class="col-md-2">Opsi</th>

	</tr>
	<?php

		$brg=mysql_query("SELECT * FROM tbl_user");
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo ucwords($b['uname']) ?></td>
			<td><?php echo $b['pass'] ?></td>
			<td><?php echo ucwords($b['nama']) ?></td>
			<td><?php echo ucwords($b['level']) ?></td>
			<td>
				<a href="edituser.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapususer.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php


	}
	?>
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data User </h4>
			</div>
			<div class="modal-body">
				<form action="simpanuser.php" method="post">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Karyawan">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input name="username" type="text" class="form-control" placeholder="Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="password" type="text" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<label>Level</label>
						<select class="form-control" name="level">
							<option value="admin">Admin</option>
							<option value="supplier">Supplier</option>
							<option value="accounting">Accounting</option>
							<option value="supervisor">Supervisor</option>
							<option value="manajerkeuangan">Manajer Keuangan</option>
						</select>
					</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php
include 'footer.php';

?>
