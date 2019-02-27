<?php
include 'header.php';
?>
<h2>Laporan Pembayaran</h2>
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Form Laporan Pembayaran</h3>
  </div>
  <div class="panel-body">
    <form id="form1" name="form1" method="post" action="cetaklaporanbayar.php" target="__blank">
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
          <option value="a.tgl_tr">Tanggal Transfer</option>
          <option value="d.nama_supplier">Supplier</option>
          <option value="a.project">Project</option>
          <option value="a.no_voucher">No Voucher</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="cetak" class="btn btn-warning btn-lg col-md-12">Cetak</button>
      </div>
    </form>
  </div>
</div>
