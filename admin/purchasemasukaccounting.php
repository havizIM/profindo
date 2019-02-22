<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data Penerimaan </strong></h3>
<a href="pembayaran.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Pembayaran</a>
<br/>
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
        <th class="col-md-2">No Invoice</th>
        <th class="col-md-2">No Voucher</th>
		<th class="col-md-2">Opsi</th>
	</tr>
	<?php
		$brg=mysql_query("SELECT * FROM request, tbl_user WHERE request.id=tbl_user.id");
	$no=1;
	while($b=mysql_fetch_array($brg)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><a href="detailpurchase.php?id=<?php echo $b['no_faktur'] ?>"><?php echo $b['no_faktur'] ?></a></td>
			<td><?php echo $b['tgl_request'] ?></td>
			<td><?php echo $b['status'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo "Rp. ".number_format($b['total_harga']) ?></td>
			<td><?php echo $b['project'] ?></td>
            <td><?php echo $b['no_invoice'] ?></td>
            <td><?php echo $b['no_voucher'] ?></td>
			<td>            
				<a onclick="if(confirm('Edit data ini ??')){ location.href='editdatapurchase.php?id=<?php echo $b['no_faktur']; ?>' }" class="btn btn-warning">Edit</a>
				<?php
					if($b['status']=='Telah di Konfirmasi Admin'){
 				?>
				<a href='konfirmasipurchaseaccounting.php?id=<?php echo $b['no_faktur'] ?>' class="btn btn-danger">Konfirmasi</a>				
				<?php }else if($b['status']=='Telah di Konfirmasi Accounting'){ ?>
				<i class="glyphicon glyphicon-ok"></i>				
					<a onclick="if(confirm('Apakah anda yakin ingin Konfirmasi data ini ??')){ location.href='detailpurchase_aco.php?id=<?php echo $b['no_faktur']; ?>' }" class="btn btn-primary">Konfirmasi Penerimaan</a>
				<?php }else if($b['status']=='Barang Telah di Terima'){ ?>				
				<i class="glyphicon glyphicon-ok"></i> &nbsp;&nbsp;&nbsp;
				Barang Telah di Terima

				<?php }else if($b['status']=='Menunggu Konfirmasi Pembayaran'){ ?>
				<a onclick="if(confirm('Apakah anda yakin Ingin Konfirmasi data ini ??')){ location.href='konfirmasipembayaran.php?id=<?php echo $b['no_faktur']; ?>' }" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Konfirmasi Pembayaran</a>

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
