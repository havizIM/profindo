<body onLoad="window.print()">
<?php
include '../admin/koneksi.php';
$pimpinan     = $_POST['nama'];
$awal     = $_POST['awal'];
$awal1	= date('d-m-Y', strtotime($awal));
$akhir     = $_POST['akhir'];
?>	
	
	<h2 align="center"  >PT. BUMI SARIMAS INDONESIA</h2>
	<h5 align="center" >Jln. Raya Padang Bukik Tinggi KM. 21 Kabupaten Pdang Pariaman</h3>
	<h5 align="center"  >Laporan Data Permintaan Harian </h2>
	<hr align="center" width="100%">
	<h3 align="center">TANGGAL : <?php echo $awal1 ?></p></h3>
							<table align="center" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Tanggal</th>
										<th >Kode Barang</th>
                                        <th >Nama</th>
                                        <th >Jumlah</th>
                                        <th >Harga</th>
                                        <th >Total Harga</th>
                                       </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                //Koneksi Ke server Database
                                $sql   = "select * from transaksi,barang where transaksi.kode_brg=barang.kode_brg and transaksi.tgl BETWEEN '$awal' AND '$akhir' order by transaksi.id_transaksi asc"; 
                                $querry = mysql_query($sql);
                                $no = 1;
                                while ($data = mysql_fetch_array($querry))
                                {
								$total=$data['harga']*$data['jml'];
								
$keseluruhan+=$total;
                                    echo "<tr>";
                                    echo "<td align='center'>$no</td>";
                                    echo "<td>$data[tgl]</td>";
									echo "<td >$data[kode_brg]</td>";
                                    echo "<td>$data[nama]</td>";
                                    echo "<td >$data[jml]</td>";
                                    echo "<td >Rp. $data[harga]</td>";
                                    echo "<td >Rp. $total</td>";

                                ?>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
								<tr>
		<td colspan="6" align="right">Total Pemasukan</td>
		<td align="left">			
		<?php 
		
			//$x=mysql_query("select sum(total_harga) as total from barang_laku");	
			//$xx=mysql_fetch_array($x);			
			echo " Rp. $keseluruhan";		
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
							