<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data Purchase </strong></h3>
<a href="request.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Request</a>

<div class="col-md-12">

</div>
<br/>
<br/>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-1">No Detail Pesanan</th>
		<th class="col-md-2">Tanggal Request</th>
		<th class="col-md-2">Status</th>
		<th class="col-md-2">Supplier</th>
		<th class="col-md-2">Project</th>
        <th class="col-md-2">No PO</th>
		<th class="col-md-2">Opsi</th>

	</tr>
	<?php
		$brg=mysql_query("SELECT * FROM request,tbl_user WHERE request.id=tbl_user.id");
	$no=1;
	while($b=mysql_fetch_array($brg)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><a href="detailpurchase.php?id=<?php echo $b['no_faktur'] ?>"><?php echo $b['no_faktur'] ?></a></td>
			<td><?php echo $b['tgl_request'] ?></td>
			<td><?php echo $b['status'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['project'] ?></td>
			<td><?php echo $b['no_po'] ?></td>
            <td>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapuspurchase.php?id=<?php echo $b['no_faktur']; ?>' }" class="btn btn-danger">Hapus</a>
				<a href="lihatorder.php?id=<?php echo $b['no_faktur']; ?>" target="_blank" class="btn btn-success">Lihat Order</a>
			</td>
		</tr>
		<?php
	}
	?>
</table>

<?php
include 'footer.php';

?>
