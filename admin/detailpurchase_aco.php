<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Detail <?php echo $_GET['id'] ?> </strong></h3>
<br/>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Barang</th>
		<th class="col-md-2">Jumlah</th>
		<th class="col-md-2">Harga</th>
	</tr>
	<?php
		$brg=mysql_query("SELECT * FROM detail_request,tbl_barang WHERE detail_request.kd_barang=tbl_barang.kd_barang and no_faktur='$_GET[id]'");
	$no=1;
	while($b=mysql_fetch_array($brg)){
			$total = $b['harga']*$b['jml'];
			@$totalakhir += $total;
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td><?php echo $b['jml'] ?></td>
			<td><?php echo "Rp. ".number_format($total) ?></td>
		</tr>
		<?php
	}
	?>
	<tr>
		<td colspan=3>Total</td>
		<td><?php echo "Rp. ".number_format($totalakhir) ?></td>
	</tr>
</table>
<form action="konfirmasipenerimaan.php?id=<?php echo $_GET['id']; ?>" method="post">

					<div class="form-group">
						<label>No Invoice</label>
						<input name="no_invoice" type="text" class="form-control" placeholder="No Invoice">
                        <label>Tgl Invoice</label>
						<input name="tgl_inv" type="date" class="form-control" placeholder="Tgl Invoice">
					</div>
					

				<div class="modal-footer">
					<input type="submit" name="simpan" class="btn btn-primary" value="Konfirmasi">
				</div>
			</form>
<?php
include 'footer.php';

?>
