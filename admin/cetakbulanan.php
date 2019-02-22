<body onLoad="window.print()">
<?php
include '../admin/koneksi.php';
$tgl=$_POST["bulan"];
?>	

	<h2 align="center"  >PT.UNITED TRACTORS PADANG </h2>
	<h5 align="center"  >Laporan Data Barang Masuk Bulanan </h2>
	<hr align="center" width="100%">
	<h3 align="center">TANGGAL : <?php echo $tgl; ?></p></h3>
							<table align="center" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Tanggal</th>
										<th >Kode Barang</th>
                                        <th >Nama Barang</th>
                                        <th >Jumlah</th>
                                       </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                //Koneksi Ke server Database
                                $sql   = "select * from tbl_barang_masuk,tbl_barang where tbl_barang_masuk.kd_barang=tbl_barang.kd_barang AND tgl_masuk LIKE '$tgl%'"; 
                                $querry = mysql_query($sql);
                                $no = 1;
                                while ($data = mysql_fetch_array($querry))
                                {
									$tot+=$data["jmlbeli"];
                                    echo "<tr>";
                                    echo "<td align='center'>$no</td>";
                                    echo "<td>$data[tgl_masuk]</td>";
									echo "<td >$data[kd_barang]</td>";
                                    echo "<td>$data[nama_barang]</td>";
                                    echo "<td >$data[jmlbeli]</td>";

                                ?>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
								<tr>
		<td colspan="4" align="right">Total Pemasukan</td>
		<td align="left">			
		<?php 
		
			//$x=mysql_query("select sum(total_harga) as total from barang_laku");	
			//$xx=mysql_fetch_array($x);			
			echo " $tot";		
		?>
		</td>
		
	</tr>
                                </tbody>
								
                            </table>
							<br><br>
							<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="63%" bgcolor="#FFFFFF">
							  
	  <p align="center"><br/>
    </td><td width="37%" bgcolor="#FFFFFF"><div align="center">Padang, <?php $tgl = date('d M Y');
echo " $tgl";?><br/>Pimpinan
  <br/><br/>
								<br/><br/>
								  <?php echo '('.$pimpinan.')'; ?><br/>
								  
								  
								  </div></td>
</tr></table>
							