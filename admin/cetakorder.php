<body onLoad="window.print()">
<?php
include 'koneksi.php';
$sql = mysql_fetch_array(mysql_query("SELECT * FROM request,tbl_user WHERE request.id=tbl_user.id"));
?>
<table>
	<tr>
		<td><img src="foto/logo.png" style="margin-left: 30px; margin-top: -20px;"></td>
	</tr>
</table>
	<h1 align="center">Purchase Order</h1>
	<table width="658">
		<tr>
			<td width="92">Kepada Yth<br> <?php echo $sql['nama'] ?></td>
			<td width=38></td>
			<td width="170">Project : <?php echo $sql['project'] ?></td>
            <td width=10></td>
			<td width="131">No PO : <?php echo $sql['no_po'] ?></td>
            <td width=10></td>
			<td width="180">Tanggal : <?php echo $sql['tgl_request'] ?></td>
		</tr>
	</table>
	<br><br>
	<table border="1" cellspacing=0 cellpadding=5 width=100%>
	<tr class="info" >
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-1">Vol</th>
		<th class="col-md-1">Sat</th>
		<th class="col-md-1">Harga</th>
		<th class="col-md-1">Total</th>
	</tr>
	<?php
		$brg=mysql_query("SELECT * FROM detail_request,tbl_barang WHERE detail_request.kd_barang=tbl_barang.kd_barang AND no_faktur='$_GET[id]'");
		$no=0;
		while($b=mysql_fetch_array($brg)){
			$no++;
			$total = $b['jml']*$b['harga'];
			@$totalakhir += $total;
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $b['nama_barang']?></td>
			<td align="center"><?php echo $b['jml'] ?></td>
			<td align="center"><?php echo $b['satuan'] ?></td>
			<td><?php echo "Rp. ".number_format($b['harga']) ?></td>
			<td><?php echo "Rp. ".number_format($total) ?></td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td colspan=5>Grand Total</td>
			<td><?php echo "Rp. ".number_format(@$totalakhir) ?></td>
		</tr>
</table>
							<br><br>
<table width="100%" border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td bgcolor="#FFFFFF">
			Hormat Kami,<br/>PT. Profindo Karya Utama
			  <br/><br/>
				<br/><br/>
				<?php echo '(Ernita Darmansius)'; ?>
			<br/>

</td>
<td><div align="center">Approved By  <br/><br/>
 <br/><br/>
 (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</div></td>
</tr>
</table>
