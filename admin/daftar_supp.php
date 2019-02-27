<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data Supplier </strong></h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#supplierModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Supplier</button>
<br/>

<div class="col-md-12">

</div>
<br/>
<br/>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Supplier</th>
		<th class="col-md-2">No Tlp</th>
		<th class="col-md-2">Alamat</th>
		<th class="col-md-2">Opsi</th>

	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tbl_supplier where nama_supplier like '%".$cari."%'");
	}else{
		$brg=mysql_query("select * from tbl_supplier");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo ucwords($b['nama_supplier']) ?></td>
			<td><?php echo $b['telepon'] ?></td>
			<td><?php echo $b['alamat'] ?></td>
			<td>
				<a href="editsupplier.php?id=<?php echo $b['id_supplier']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapussupplier.php?id=<?php echo $b['id_supplier']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php


	}
	?>
</table>

<!-- modal input -->
<div id="supplierModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Supplier </h4>
			</div>
			<div class="modal-body">
				<form action="simpansupplier.php" method="post">

					<div class="form-group">
						<label>Nama Supplier</label>
						<input name="nama_supplier" required type="text" class="form-control" placeholder="Nama Supplier">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input name="telepon" type="number" required class="form-control" placeholder="Telepon">
					</div>
					<div class="form-group">
						<label>Alamat</label>
            <textarea name="alamat" rows="8" cols="80" required class="form-control" placeholder="Alamat"></textarea>
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
