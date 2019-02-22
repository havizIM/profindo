<body onLoad="window.print()">
<?php
include '../admin/koneksi.php';
$tgl=@$_POST["bulan"];
?>

	<h2 align="center"  >PROFINDO KARYA UTAMA </h2>

	<h3 align="center"  >Laporan Data Barang </h3>
	<hr align="center" width="100%">

							<table class="table table-bordered" border="1" align="center" width="80%">
	<tr class="info" >
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-2">Satuan</th>
		<th class="col-md-2">Harga</th>
		<th class="col-md-2">Supplier</th>

	</tr>
	<?php

		$brg=mysql_query("select * from tbl_barang");

	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo ucwords($b['nama_barang']) ?></td>
			<td><?php echo $b['satuan'] ?></td>
			<td><?php echo $b['harga'] ?></td>
			<td><?php echo $b['supplier'] ?></td>

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
