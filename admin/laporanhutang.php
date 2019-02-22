<?php
include 'header.php';
?>
<h2>Laporan Hutang</h2>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Form Laporan Hutang</h3>
  </div>
  <div class="panel-body">
    <form id="form1" name="form1" method="post" action="cetaklaporanhutang.php" target="__blank">
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
          <option value="a.tgl_inv">Tgl Invoice</option>
          <option value="c.supplier">Supplier</option>
          <option value="a.project">Project</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="cetak" class="btn btn-danger btn-lg col-md-12">Cetak</button>
      </div>
    </form>
  </div>
</div>
