<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Laporan Tahun</strong></h3>

<form method="POST" target="_blank" action="../admin/cetaklapoorantahunan.php">
										<div class="col-md-5">
                                            <label>Tahun</label>
										   <input class="form-control" name="awal" required>
                                        
										
										
                                            <label>Nama Pimpinan</label>
										   <input class="form-control" name="nama"required>
                                        
										
										<tr>
										<td><button type="submit" class="btn btn-outline btn-primary">Cetak</button>
										<button type="reset"  class="btn btn-outline btn-primary">Reset</button>
										</td>
										</tr>
										
										
										
										</form>

<?php 
include 'footer.php';

?>