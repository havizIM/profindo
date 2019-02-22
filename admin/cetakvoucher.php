<body onLoad="window.print()">
<?php
include 'koneksi.php';
$sql = mysql_fetch_array(mysql_query("SELECT * FROM request WHERE no_voucher='$_GET[no_voucher]'"));
?>
<table>
	<tr>
		<td><h1>Voucher Bayar </h1></td>
		<td><img src="foto/logo.png" style="margin-left: 30px; margin-top: -20px;"></td>
	</tr>
</table>
	<br>
	<table>
		<tr>
			<td>No Rek </td>
			<td> &nbsp;&nbsp; : &nbsp;&nbsp;</td>
			<td><?php echo $sql['no_rek'] ?></td>
		</tr>
		<tr>
			<td>Bank </td>
			<td> &nbsp;&nbsp; : &nbsp;&nbsp;</td>
			<td><?php echo $sql['nm_bank'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Transfer </td>
			<td> &nbsp;&nbsp; : &nbsp;&nbsp;</td>
			<td><?php echo $sql['tgl_tr'] ?></td>
		</tr>
		<tr>
			<td>Jam Transfer </td>
			<td> &nbsp;&nbsp; : &nbsp;&nbsp;</td>
			<td><?php echo $sql['jam_tr'] ?></td>
		</tr>
		<tr>
			<td>No Voucher </td>
			<td> &nbsp;&nbsp; : &nbsp;&nbsp;</td>
			<td><?php echo $sql['no_voucher'] ?></td>
		</tr>
	</table>
	<br><br>
	<table border="1" cellspacing=0 cellpadding=5 width=100%>
	<tr class="info" >
		<th class="col-md-1">No</th>
		<th class="col-md-2">No Invoice</th>
		<th class="col-md-2">Tgl Invoice</th>
		<th class="col-md-2">Nama Supplier</th>
		<th class="col-md-2">DPP</th>
		<th class="col-md-2">PPN</th>
		<th class="col-md-2">Jumlah</th>
	</tr>
	<?php
		$brg=mysql_query("SELECT * FROM request,tbl_user WHERE request.id=tbl_user.id AND no_voucher='$_GET[no_voucher]'");
		$no=0;
		while($b=mysql_fetch_array($brg)){
			$no++;
			@$totalakhir += $b['total_harga'];
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['no_invoice']?></td>
			<td><?php echo $b['tgl_inv']?></td>
			<td><?php echo $b['nama'] ?></td>
			
			<td><?php echo number_format($b['total_harga']) ?></td>
			
			<td></td>
			<td><?php echo number_format($b['total_harga']) ?></td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td colspan=6 align="center">Total</td>
			<td><?php echo number_format(@$totalakhir) ?></td>
		</tr>
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
