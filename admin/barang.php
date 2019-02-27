<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data Barang </strong></h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>


<div class="col-md-12">

</div>
<br/>
<br/>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-2">Satuan</th>
		<th class="col-md-2">Harga</th>
		<th class="col-md-2">Opsi</th>

	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tbl_barang where nama_barang like '%".$cari."%'");
	}else{
		$brg=mysql_query("select * from tbl_barang");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo ucwords($b['nama_barang']) ?></td>
			<td><?php echo $b['satuan'] ?></td>
			<td><?php echo "Rp. ".number_format($b['harga']) ?></td>
			<td>
				<a href="editbarang.php?id=<?php echo $b['kd_barang']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusbarang.php?id=<?php echo $b['kd_barang']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<h4 class="modal-title">Tambah Data Barang </h4>
			</div>
			<div class="modal-body">
				<form action="simpanbarang.php" method="post">

					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama_barang" type="text" class="form-control" placeholder="Nama Barang">
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<input name="satuan" type="text" class="form-control" placeholder="Satuan">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input name="harga" type="number" class="form-control" placeholder="Harga">
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
