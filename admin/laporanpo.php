<?php
include 'header.php';
?>
<h2>Laporan Purchase Order</h2>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Form Laporan Purchase Order</h3>
  </div>
  <div class="panel-body">
    <form id="form1" name="form1" method="post" action="cetaklaporanpo.php" target="__blank">
      <div class="form-group">
        <label>Dari Tanggal</label>
        <input type="date" name="tgl_awal" class="form-control">
      </div>
      <div class="form-group">
        <label>Sampai Tanggal</label>
        <input type="date" name="tgl_akhir" class="form-control">
      </div>
      <div class="form-group">
        <label>Sort By</label>
        <select class="form-control" name="sort_by">
          <option value="">-- Pilih Sort --</option>
          <option value="c.supplier">Supplier</option>
          <option value="a.no_po">No. PO</option>
          <option value="a.project">Project</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="cetak" class="btn btn-info btn-lg col-md-12">Cetak</button>
      </div>
    </form>
  </div>
</div>
