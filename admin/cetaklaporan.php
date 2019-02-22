<body onLoad="window.print()">
<?php
include '../admin/koneksi.php';
$tgl1=@$_POST["tgl1"];
$tgl2=@$_POST["tgl2"];
?>

	<h2 align="center">PROFINDO KARYA UTAMA </h2>

	<h3 align="center">Laporan </h3>
	
	<hr align="center" width="100%"><center>
Dari Tanggal <?php echo $tgl1;?> Sampai Tanggal <?php echo $tgl2;?> </center>
Sort By : </center>
 <table class="table table-bordered" border="1" align="center" width="80%">
	 <tr class="info">
 		<th class="col-md-0">No</th>
		<th class="col-md-2">Tanggal Request</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-0">Jumlah</th>
		<th class="col-md-2">Harga Satuan</th>
		<th class="col-md-2">Total Harga</th>
        <th class="col-md-2">No Invoice</th>
        <th class="col-md-2">Tgl Invoice</th>
        <th class="col-md-2">Supplier</th>
        <th class="col-md-2">Project</th>
        <th class="col-md-2">No PO</th>     

 	</tr>
 	<?php
 		$brg=mysql_query("SELECT * FROM request,tbl_user,detail_request,tbl_barang WHERE request.id=tbl_user.id=detail_request.kd_barang=tbl_barang.kd_barang and tgl_request >= '$tgl1' AND tgl_request <= '$tgl2'");
 	$no=1;
 	while($b=mysql_fetch_array($brg)){
 		?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $b['tgl_request'] ?></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td><?php echo $b['jml'] ?></td>
			<td><?php echo "Rp. ".number_format($total) ?></td>
            <td><?php echo "Rp. ".number_format($totalakhir) ?></td>
            <td><?php echo $b['no_invoice'] ?></td>
            <td><?php echo $b['tgl_inv'] ?></td>
            <td><?php echo $b['nama'] ?></td>
            <td><?php echo $b['project'] ?></td>
            <td><?php echo $b['no_po'] ?></td>
 		</tr>
 		<?php
 	}
 	?>
</table>
							<br><br>
							<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="63%" bgcolor="#FFFFFF">

	  <p align="center"><br/>
    </td><td width="37%" bgcolor="#FFFFFF"><div align="center">Padang, <?php $tgl = date('d M Y');
echo " $tgl";?><br/>Hormat Kami
  <br/><br/>
								<br/><br/>
								  <?php echo '(....................)'; ?><br/>


								  </div></td>
</tr></table>
