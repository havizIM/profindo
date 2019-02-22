<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Data Keuangan</strong></h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-1"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
<br/>


<div class="col-md-12">
	
</div>
<br/>
<br/>
<table class="table table-bordered">
	 <tr class="info">
        	<th>No</th>
        	<th>Tanggal</th>
            <th>Keterangan</th>
            <th> Debit </th>
            <th> Kredit </th>
            <th>Saldo </th>
            
        </tr>
	<?php 
	include 'koneksi.php';
	$no=1;
		$sql = mysql_query("select * from tb_kas order by tgl asc") or die (mysql_error());
		$cek = mysql_num_rows($sql);
while($data = mysql_fetch_array($sql))
			{
			if($data[jenis]=="Pengeluaran"){
			$sub_tot1=$sub_tot1-$data[kredit];
			}else{
			$sub_tot1=$sub_tot1+$data[debit];
			}
		?>
		<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['tgl']; ?></td>
				<td><?php echo $data['ket']; ?></td>
				
				<td align="left" style="border-left:0;"><?php if($data[debit]!="" and $data[debit]!=0){echo"Rp.";} ?> <?php if($data[debit]!="" and $data[debit]!=0){echo number_format($data['debit'], 2, ".", ",");} ?></td>
				<td align="right" style="border-left:0;"><?php if($data[kredit]!="" and $data[kredit]!=0){echo"Rp.";} ?> <?php if($data[kredit]!="" and $data[kredit]!=0){echo number_format($data['kredit'], 2, ".", ",");} ?></td>
				
				<td align="right" style="border-left:0;"> Rp. <?php echo number_format($sub_tot1, 2, ".", ","); ?></td>
				
					
			</tr>
			<?php
			$no++;
			}
			?>
			<tr><td colspan=5><b>TOTAL</b></td><td align="right" style="border-left:0;"> Rp.<?php echo number_format($sub_tot1, 2, ".", ","); ?></td></tr>
			
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Keuangan</h4>
			</div>
			<div class="modal-body">
				<form action="simpan_keuangan.php" method="post">
					
					<div class="form-group">
						<label>Tanggal</label>
						<input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<select name="jenis">
						<option value="">--Pilih--</option>
						<option value="Pendapatan">Pendapatan</option>
						<option value="Pengeluaran">Pengeluaran</option>
						</select>
					</div>	
					<div class="form-group">
						<label>Keterangan</label>
						<input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>	
					
					
																
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>



<?php 
include 'footer.php';

?>