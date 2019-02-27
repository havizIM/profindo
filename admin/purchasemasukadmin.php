<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data Purchase </strong></h3>
<br/>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-1">No Detail Pesanan</th>
		<th class="col-md-2">Tanggal Request</th>
		<th class="col-md-2">Status</th>
		<th class="col-md-2">Supplier</th>
		<th class="col-md-2">Total Harga</th>
		<th class="col-md-2">Project</th>
        <th class="col-md-2">NO PO</th>
		<th class="col-md-2">Opsi</th>

	</tr>
	<?php
		$brg=mysql_query("SELECT * FROM request, tbl_supplier WHERE request.id=tbl_supplier.id_supplier");
	$no=1;
	while($b=mysql_fetch_array($brg)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><a href="detailpurchase.php?id=<?php echo $b['no_faktur'] ?>"><?php echo $b['no_faktur'] ?></a></td>
			<td><?php echo $b['tgl_request'] ?></td>
			<td><?php echo $b['status'] ?></td>
			<td><?php echo $b['nama_supplier'] ?></td>
			<td><?php echo $b['total_harga'] ?></td>
			<td><?php echo $b['project'] ?></td>
            <td><?php echo $b['no_po'] ?></td>
			<td>
            <a href="cetakorder.php?id=<?php echo $b['no_faktur']; ?>" target="_blank" class="btn btn-success">Cetak Order</a>
				<?php
					if($b['status']=='Tunggu Konfirmasi Admin'){
 				?>
				<a onclick="if(confirm('Apakah anda yakin ingin Konfirmasi data ini ??')){ location.href='konfirmasipurchaseadmin.php?id=<?php echo $b['no_faktur']; ?>' }" class="btn btn-danger">Konfirmasi</a>
				<?php }else if($b['status']=='Telah di Konfirmasi Admin'){ ?>
				<i class="glyphicon glyphicon-ok"></i>
			<?php }else if($b['status']=='Transaksi Sukses'){ ?>
			<i class="glyphicon glyphicon-ok-sign"></i>
				<?php } ?>
			</td>
		</tr>
		<?php
	}
	?>
</table>


<?php
include 'footer.php';

?>
