<?php
include 'header.php';
$tgl1=@$_POST["tgl1"];
$tgl2=@$_POST["tgl2"];
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Masukkan Pembayaran</h3>

	<form action="" method="post">
    <table border="0" width="50%">
  <tr><td>Dari Tanggal<input type="date" name="tgl1" class="form-control"> </td>
 <td>Sampai Tanggal <input type="date" name="tgl2" class="form-control">  </td></tr><tr>
<td>
		<table class="table">
			<tr>
				<td>Pilih Supplier</td>
				<td>
						<select name="supplier" class="form-control">
							<option value="">-- Pilih Supplier--</option>
							<?php
								$sql = mysql_query("SELECT * FROM request,tbl_supplier WHERE request.id=tbl_supplier.id_supplier AND status='Barang Telah di Terima' GROUP BY request.id");
								while($r=mysql_fetch_array($sql)){
 							?>
								<option value="<?php echo $r['id_supplier']?>"><?php echo $r['nama_supplier'] ?></option>
							<?php } ?>
						</select>
				</td>
			</tr>
			<tr>
				<td><button type="submit" name="cari" class="btn btn-info">Cari</button></td>
			</tr>
		</table>
	<h3>Supplier : <?php
									error_reporting(0);
										$nm = mysql_fetch_array(mysql_query("SELECT * FROM tbl_supplier WHERE id='$_POST[supplier]'"));
									echo $nm['nama'] ?></h3>
	<table class="table">
		<tr>
			<td>No</td>
			<td>No Invoice</td>
            <td>Tgl Invoice</td>
			<td>Total Harga</td>
		</tr>
		<?php
			if(isset($_POST['cari'])){
				$no = 0;
				$sql = mysql_query("SELECT * FROM request WHERE id='$_POST[supplier]' AND status='Barang Telah di Terima' and tgl_inv >= '$tgl1' AND tgl_inv <= '$tgl2'");

			while($r=mysql_fetch_array($sql)){
				$no++;
				$total = $r['total_harga'];
				@$totalakhir += $total;
 		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $r['no_invoice'] ?></td>
            <td><?php echo $r['tgl_inv'] ?></td>
			<td><?php echo "Rp. ".number_format($total) ?></td>
		</tr>
		<?php }} ?>
		<tr>
			<td colspan=2>Total Bayar</td>
			<td><?php echo "Rp. ".number_format(@$totalakhir) ?></td>
		</tr>
	</table>
	<br>
	<h4>Informasi Bank</h4>
			<table>
				<tr>
					<td>No Rek</td>
					<td> : </td>
					<td><input type="text" name="norek" class="form-control">
							<input type="hidden" name="idsup" class="form-control" value="<?php echo $_POST['supplier'] ?>"></td>
							<input type="hidden" name="tgl_awal" value="<?php echo $tgl1 ?>">
							<input type="hidden" name="tgl_akhir" value="<?php echo $tgl2 ?>">
				</tr>
				<tr>
					<td>Nama Bank</td>
					<td> : </td>
					<td><input type="text" name="nmbank" class="form-control"></td>
				</tr>
				<tr>
                	<td>Tgl Transfer</td>
					<td> : </td>
					<td><input type="date" name="tgl_tr" class="form-control"></td>
				</tr>
				<tr>
                	<td>Jam Transfer</td>
					<td> : </td>
					<td><input type="time" name="jam_tr" class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" name="bayar" class="btn btn-info">Bayar</button></td>
				</tr>
			</table>
	</form>

<?php
include 'koneksi.php';

if(isset($_POST["bayar"])){

	$query = mysql_query("SELECT max(no_voucher) as maxKode FROM request");
	$data = mysql_fetch_array($query);
	$kodevoucher = $data['maxKode'];

	$nourut = (int) substr($kodevoucher, 2, 3);
	$nourut++;

	$kode = "VB";
	$kodebaru = $kode . sprintf("%03s", $nourut);

	$update = mysql_query("UPDATE request SET status='Menunggu Konfirmasi Pembayaran', no_rek='$_POST[norek]', nm_bank='$_POST[nmbank]', no_voucher='$kodebaru', tgl_tr='$_POST[tgl_tr]', jam_tr='$_POST[jam_tr]' WHERE id='$_POST[idsup]' AND status='Barang Telah di Terima' AND tgl_inv BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'");

	echo "<script>window.location='cetakvoucher.php?no_voucher=$kodebaru'</script>";
}
?>

<?php include 'footer.php'; ?>
