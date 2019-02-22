<body onLoad="window.print()">
<?php
  include '../admin/koneksi.php';
  $tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];
  $sort_by = $_POST['sort_by'];

  if($sort_by == 'c.supplier'){
    $sort_status = 'Supplier';
  } else if($sort_by == 'a.no_po') {
    $sort_status = 'No. Po';
  } else if($sort_by == 'a.project') {
    $sort_status = 'Project';
  }
?>

<h2 align="center">PT. PROFINDO KARYA UTAMA </h2>
<h5 align="center">Laporan Purchase Order </h2>
<hr align="center" width="100%">
<h4 align="center">Periode : <?= date('d-m-Y', strtotime($tgl_awal)).' s/d '.date('d-m-Y', strtotime($tgl_awal)); ?></p></h3>
<h4 align="center">Sort By : <?= $sort_status; ?></p></h3>


<table align="center" width="100%" border="1">
	<tr class="info">
	  <th class="col-md-0">No</th>
	  <th class="col-md-2">Tgl Request</th>
	  <th class="col-md-1">No PO</th>
	  <th class="col-md-2">Project</th>
	  <th class="col-md-2">Supplier</th>
	  <th class="col-md-2">Nama Barang</th>
    <th class="col-md-0">Volume</th>
    <th class="col-md-2">Harga Satuan</th>
    <th class="col-md-2">Total Harga</th>
	</tr>

  <?php
//Koneksi Ke server Database
    $sql   = "SELECT * FROM request a LEFT JOIN detail_request b ON b.no_faktur = a.no_faktur LEFT JOIN tbl_barang c ON c.kd_barang = b.kd_barang WHERE a.tgl_request BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY $sort_by ASC";
    $querry = mysql_query($sql);
    $total = mysql_num_rows($querry);
    $total_po = 0;
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
          <td><?= $data['tgl_request'] ?></td>
          <td><?= $data['no_po'] ?></td>
          <td><?= $data['project'] ?></td>
          <td><?= $data['supplier'] ?></td>
          <td><?= $data['nama_barang'] ?></td>
          <td><?= $data['jml'] ?></td>
          <td><?= number_format($data['harga']) ?></td>
          <td><?= number_format($total_harga) ?></td>
        </tr>

        <?php $total_po += $total_harga ?>

      <?php } ?>

    <?php } ?>


</table>

<br><br><br>

<table width="50%" border="1">
  <tr>
    <td><b>Total PO</b></td>
    <td><b><?= number_format($total_po) ?></b></td>
  </tr>
</table>

</body>
