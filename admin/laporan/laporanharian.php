<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Laporan Harian</strong></h3>

<form method="POST" target="_blank" action="../admin/cetaklapooranharian.php">
										<div class="col-md-5">
                                            <label>Tanggal Awal</label>
										  <input name="awal" type="text" class="form-control" id="tgl" autocomplete="off">
										   <br>
										   
                                            <label>Tanggal Akhir</label>
										   <input name="akhir" type="text" class="form-control" id="tgl1" autocomplete="off">
                                        <br>
										
                                            <label>Nama Pimpinan</label>
										   <input class="form-control" name="nama"required>
										<br>
										<button type="submit" class="btn btn-outline btn-primary">Cetak</button>
										<button type="reset"  class="btn btn-outline btn-primary">Reset</button>
										
										
										</div>
										</form>
<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
		$(document).ready(function(){
			$("#tgl1").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
<?php 
include 'footer.php';

?>