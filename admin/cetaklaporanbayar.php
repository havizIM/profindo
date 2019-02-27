<body onLoad="window.print()">
<?php
  include '../admin/koneksi.php';
  $tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];
  $sort_by = $_POST['sort_by'];

  if($sort_by == 'a.tgl_tr'){
    $sort_status = 'Tgl Transfer';
  } elseif($sort_by == 'd.nama_supplier') {
    $sort_status = 'Supplier';
  } elseif($sort_by == 'a.project') {
    $sort_status = 'Project';
  } elseif($sort_by == 'a.no_voucher') {
    $sort_status = 'No Voucher';
  }
?>

<h2 align="center">PT. PROFINDO KARYA UTAMA </h2>
<h5 align="center">Laporan Pembayaran </h2>
<hr align="center" width="100%">
<h4 align="center">Periode : <?= date('d-m-Y', strtotime($tgl_awal)).' s/d '.date('d-m-Y', strtotime($tgl_akhir)); ?></p></h3>
<h4 align="center">Sort By : <?= $sort_status; ?></p></h3>


<table align="center" width="100%" border="1">
	<tr class="info">
		<th class="col-md-0">No</th>
		<th class="col-md-2">Tanggal Transfer</th>
		<th class="col-md-2">Tgl Invoice</th>
		<th class="col-md-2">No Invoice</th>
		<th class="col-md-2">Total Harga</th>
		<th class="col-md-2">Supplier</th>
    <th class="col-md-2">Project</th>
    <th class="col-md-2">No Voucher</th>
	</tr>

  <?php
//Koneksi Ke server Database
    $sql   = "SELECT * FROM request a LEFT JOIN detail_request b ON b.no_faktur = a.no_faktur LEFT JOIN tbl_barang c ON c.kd_barang = b.kd_barang LEFT JOIN tbl_supplier d ON d.id_supplier = a.id WHERE a.status = 'Transaksi Sukses' AND a.tgl_tr BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY $sort_by ASC";
    $querry = mysql_query($sql);
    $total = mysql_num_rows($querry);
    $total_bayar = 0;
    $no = 1;

    if($total < 1) { ?>

      <tr>
        <td colspan="9" align="center">Data tidak ditemukan</td>
      </tr>

    <?php
    } else {
      while ($data = mysql_fetch_array($querry)) {

        $total_harga = $data['jml'] * $data['harga'];
    ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['tgl_tr'] ?></td>
          <td><?= $data['tgl_inv'] ?></td>
          <td><?= $data['no_invoice'] ?></td>
          <td><?= number_format($total_harga) ?></td>
          <td><?= $data['nama_supplier'] ?></td>
          <td><?= $data['project'] ?></td>
          <td><?= $data['no_voucher'] ?></td>
        </tr>

        <?php $total_bayar += $total_harga; ?>

      <?php } ?>

    <?php } ?>


</table>

<br><br><br>

<table width="50%" border="1">
  <tr>
    <td><b>Total Pembayaran</b></td>
    <td><b><?= number_format($total_bayar) ?></b></td>
  </tr>
</table>

</body>
