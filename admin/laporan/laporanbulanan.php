<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Laporan Bulanan</strong></h3>

						<form method="POST" target="_blank" action="../admin/cetaklapooranbulanan.php">
						
							<div class="col-md-5">
								<label>Bulan</label>
								<select class="form-control" name="txt_bln" required>
								<option value="01">Januari</option>
								<option value="02">Fubruari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Julli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
								</select>
												
						
							
								<label>Tahun</label>
								<input type="text" class="form-control" name="txt_thn" required>
							
						
						
							
								<label>Nama Pimpinan</label>
								<input type="text" class="form-control" name="txtpm" required>
							
							<tr>
								<td><button type="submit" class="btn btn-outline btn-primary">Cetak</button>
										<button type="reset"  class="btn btn-outline btn-primary">Reset</button>
										</td>
							</tr>
							</div>
						
						
						
							
							
						
						</form>
<?php 
include 'footer.php';

?>