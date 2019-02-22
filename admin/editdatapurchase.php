<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Edit Data  <?php echo $_GET['id'] ?> </strong></h3>
<br/>
<h3>Daftar Barang yang Dipesan</h3>
<table class="table table-bordered">
	<tr class="info">
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Barang</th>
		<th class="col-md-2">Jumlah</th>
		<th class="col-md-2">Harga</th>
		<th class="col-md-1">Ket</th>
	</tr>
	<?php
		$brg=mysql_query("SELECT * FROM detail_request,tbl_barang WHERE detail_request.kd_barang=tbl_barang.kd_barang and no_faktur='$_GET[id]'");
	$no=1;
	while($b=mysql_fetch_array($brg)){
			$total = $b['harga']*$b['jml'];
			@$totalakhir += $total;
		?>
		<tr>
			<td><?php echo $no++ ?> <input type="hidden" name="kd_barang" value="<?php echo $b['kd_barang'] ?>"></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td><?php echo $b['jml'] ?></td>
			<td><?php echo "Rp. ".number_format($total) ?></td>
			<td><a onclick="if(confirm('Hapus Data ??')){ location.href='hapusdatapurchase.php?id=<?php echo $b['no_faktur']; ?>&kd_barang=<?php echo $b['kd_barang']; ?>' }" class="btn btn-danger">Hapus</a></td>
		</tr>
		<?php
	}
	?>
	<tr>
		<td colspan=3>Total</td>
		<td colspan="2"><?php echo "Rp. ".number_format($totalakhir) ?></td>
	</tr>
</table>

<!-- ---------------------------------- -->
<form action="" method="post">
		<table class="table">
			<tr>
				<td>Barang</td>
				<td><select name="kd_barang" type="text" class="form-control" onchange="changeValue(this.value)">
							<option value="">--Pilih Barang--</option>
							<?php
          				$result = mysql_query("select * from tbl_barang");
									$jsArray = "var dtbarang = new Array(); \n";
          				while ($row = mysql_fetch_array($result)) {
										echo "<option value=$row[kd_barang]>  $row[nama_barang]  </option>";
										$jsArray .= "dtbarang['" . $row['kd_barang'] . "'] = {harga: '". addslashes($row['harga'])."'}; \n";
          				}
          			?>
						</select></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" id="harga" readonly></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jml"></td>
			</tr>
			<tr>
				<td></td>
				<input type="hidden" name="totalakhirupdate" value="<?= @$totalakhir ?>">
				<td><input type="submit" name="tambah" class="btn btn-info" value="Tambah"></td>
			</tr>
		</table>
	</form>
	
	

	<script type="text/javascript">
	     <?php echo $jsArray; ?>
	        function changeValue(kd_barang){
	        document.getElementById('harga').value = dtbarang[kd_barang].harga;
	        };
	    </script>

<?php
include 'koneksi.php';
if(isset($_POST["tambah"])){
	// echo "string";
	$kd_barang = $_POST['kd_barang'];
	$jml	= $_POST['jml'];
	$no_faktur = $_GET['id'];
	$tupdate = $_POST['totalakhirupdate'];
	$harga = $_POST['harga'];

	$brg=mysql_query("SELECT * FROM tbl_barang WHERE kd_barang='$_POST[kd_barang]'");
	if(mysql_num_rows($brg)>0){
	$cr=mysql_query("SELECT * FROM detail_request WHERE no_faktur='$no_faktur' AND kd_barang='$kd_barang'");
	if(mysql_num_rows($cr)>0){
		$rcr=mysql_fetch_array($cr);
		mysql_query("UPDATE detail_request SET jml=jml+$jml WHERE no_faktur='$no_faktur' AND kd_barang=$kd_barang");
		$jsub = $jml * $harga;
		$akhir = $tupdate + $jsub;
		$a ="UPDATE request SET total_harga=$akhir WHERE no_faktur='$no_faktur'";
		$updatereq = mysql_query($a);
	}else{
		$sqlsimpan	= "INSERT INTO detail_request VALUES(
 		                       '$no_faktur','$kd_barang','$jml')";
		$querysimpan	= mysql_query($sqlsimpan);
		$jsub = $jml * $harga;
		$akhir = $tupdate + $jsub;
		$a ="UPDATE request SET total_harga=$akhir WHERE no_faktur='$no_faktur'";
		$updatereq = mysql_query($a);
	}
}
echo "<script>alert('Data Berhasil Ditambahkan');history.go(-1) </script>";
// echo "<META HTTP-EQUIV='Refresh' Content='0; URL=request.php'>";
}
?>
<!-- ------------------------------------------ -->

<?php
include 'footer.php';

?>
