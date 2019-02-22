<?php
include 'header.php';
if(@$_GET['aksi']=='hapus'){
	$sql = mysql_query("DELETE FROM tmp WHERE id_tmp='$_GET[id]'");
	echo "<META HTTP-EQUIV='Refresh' Content='0; URL=request.php'>";
}
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Input data barang yang akan dibeli</h3>

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
				<td><input type="submit" name="tambah" class="btn btn-info" value="Tambah"></td>
			</tr>
		</table>
	</form>
	<form class="" method="post">
	<table class="table">
		<tr>
			<td>No</td>
			<td>Nama Barang</td>
			<td>Jumlah</td>
			<td>Total Harga</td>
			<td>Opsi</td>
		</tr>
		<?php
			$no = 0;
			$sql = mysql_query("SELECT * FROM tmp,tbl_barang WHERE tmp.kd_barang=tbl_barang.kd_barang");
			while($r=mysql_fetch_array($sql)){
				$total = $r['harga']*$r['jml'];
				@$totalakhir += $total;
				$no++;
 		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $r['nama_barang'] ?></td>
			<td><?php echo $r['jml'] ?></td>
			<td><?php echo "Rp. ".number_format($total) ?></td>
			<td><a href="request.php?aksi=hapus&id=<?php echo $r['id_tmp'] ?>">Hapus</a></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan=3>Total</td>
			<td><?php echo "Rp. ".number_format(@$totalakhir) ?></td>
		</tr>
	</table>
	<input type="hidden" name="totalharga" value="<?php echo $totalakhir; ?>">
	<input type="text" name="project" class="form-control" placeholder="Project" required><br>
    <input type="text" name="no_po" class="form-control" placeholder="No PO" required><br/>
	<select class="form-control" name="supplier" required>
		<option value="">--Pilih Supplier--</option>
		<?php
			$sup = mysql_query("SELECT * FROM tbl_user WHERE level='supplier'");
			while($r=mysql_fetch_array($sup)){
 		?>
			<option value="<?php echo $r['id'] ?>"><?php echo $r['nama'] ?></option>
		<?php } ?>
	</select>
	<br>
	
	<button type="submit" name="simpan" class="btn btn-info btn-block"><b>SIMPAN</b></button>
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
$kd_barang			= $_POST['kd_barang'];
$jml	= $_POST['jml'];

$brg=mysql_query("SELECT * FROM tbl_barang WHERE kd_barang='$_POST[kd_barang]'");
if(mysql_num_rows($brg)>0){
	$cr=mysql_query("SELECT * FROM tmp WHERE kd_barang='$_POST[kd_barang]'");
	if(mysql_num_rows($cr)>0){
		$rcr=mysql_fetch_array($cr);
		mysql_query("UPDATE tmp SET jml=jml+$_POST[jml] WHERE id_tmp='$rcr[id_tmp]'");
	}else{
		$sqlsimpan	= "INSERT INTO tmp VALUES(
		                       '','$kd_barang','$jml')";
		$querysimpan	= mysql_query($sqlsimpan);
	}
}
echo "<META HTTP-EQUIV='Refresh' Content='0; URL=request.php'>";
}

if(isset($_POST["simpan"])){
	$status='Tunggu Konfirmasi Admin';
	$tgl_request = date('Y-m-d');
	$no_faktur = date('YmdHis');
	$query = mysql_query("INSERT INTO request( no_faktur,total_harga,tgl_request,status,id,project,no_po)
					  	VALUES('$no_faktur','$_POST[totalharga]','$tgl_request','$status','$_POST[supplier]','$_POST[project]','$_POST[no_po]')")or die('Ada kesalahan pada query insert request : '.mysql_error());
	if ($query) {
		$sql = mysql_query("SELECT * FROM tmp") or die('Ada kesalahan pada query tampil tmp : '.mysql_error());
		while ($data = mysql_fetch_assoc($sql)) {

		$query1 = mysql_query("INSERT INTO detail_request( no_faktur,kd_barang, jml)								  		 VALUES('$no_faktur','$data[kd_barang]','$data[jml]')")
							or die('Ada kesalahan pada query insert request detail : '.mysql_error());

		$br = mysql_fetch_array(mysql_query("SELECT * FROM tbl_barang WHERE kd_barang='$data[kd_barang]'"));
			$tjml = $br['jumlah'] - $data['jml'];
			$query2 = mysql_query("UPDATE tbl_barang SET jumlah   = '$tjml'	WHERE kd_barang = '$data[kd_barang]'") or die('Ada kesalahan pada query update jumlah : '.mysql_error());
		}
		if($query1){
				$query3 = mysql_query("DELETE FROM tmp") or die('Ada kesalahan pada query delete : '.mysql_error());
				if ($query3) {
						// jika berhasil tampilkan pesan berhasil simpan data
						echo "<script>window.location='purchase.php';</script>";
				}
		}
	}
}
?>

<?php include 'footer.php'; ?>
