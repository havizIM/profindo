<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data Supllier </strong></h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-1"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
<br/>


<div class="col-md-12">
	
</div>
<br/>
<br/>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Supplier</th>
		<th class="col-md-2">Alamat</th>
		<th class="col-md-2">No Handphone</th>
		<th class="col-md-2">Opsi</th>
		
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tbl_supplier where nama_sup like '%".$cari."%'");
	}else{
		$brg=mysql_query("select * from tbl_supplier");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama_sup'] ?></td>
			<td><?php echo $b['alamat'] ?></td>
			<td><?php echo $b['no_telp'] ?></td>
			<td>
				<a href="editsuplier.php?id=<?php echo $b['kd_sup']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapussuplier.php?id=<?php echo $b['kd_sup']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<h4 class="modal-title">Tambah Data Supllier </h4>
			</div>
			<div class="modal-body">
				<form action="simpansuplier.php" method="post">
					
					<div class="form-group">
						<label>Nama Supplier</label>
						<input name="nama_sup" type="text" class="form-control" placeholder="Nama Suplier">
					</div>
					<div class="form-group">
						<label>alamat</label>
						<input name="alamat" type="text" class="form-control" placeholder="Alamat">
					</div>	
					<div class="form-group">
						<label>No. Handphone</label>
						<input name="no_telp" type="text" class="form-control" placeholder="No Handphone">
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>