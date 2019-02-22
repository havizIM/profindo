<body onLoad="window.print()">
<?php
include '../admin/koneksi.php';
$tgl=$_POST["nm_department"];
$det=mysql_query("select * from tbl_department where kd_department='$tgl'");
$d=mysql_fetch_array($det);
?>	

	<h2 align="center"  >PT.UNITED TRACTORS PADANG </h2>
	
	<h5 align="center"  >Laporan Data Barang Keluar </h2>
	<hr align="center" width="100%">
	<h3 align="center">Department : <?php echo $d['nm_department']; ?></p></h3>
							<table align="center" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Tanggal</th>
										<th >Kode Barang</th>
                                        <th >Nama Barang</th>
										<th >Nama Karyawan</th>
										<th >Jumlah</th>
                                       </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                //Koneksi Ke server Database
                                $sql   = "select * from tbl_barang_keluar,tbl_barang,tbl_department,admin where tbl_barang_keluar.kd_barang=tbl_barang.kd_barang AND  tbl_barang_keluar.nama=admin.nama AND admin.kd_department=tbl_department.kd_department AND tbl_department.kd_department ='$tgl'"; 
                                $querry = mysql_query($sql);
                                $no = 1;
                                while ($data = mysql_fetch_array($querry))
                                {
									$tot+=$data["jml"];
                                    echo "<tr>";
                                    echo "<td align='center'>$no</td>";
                                    echo "<td>$data[tgl_keluar]</td>";
									echo "<td >$data[kd_barang]</td>";
                                    echo "<td>$data[nama_barang]</td>";
									
									echo "<td >$data[nama]</td>";
									echo "<td >$data[jml]</td>";
                                ?>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
								<tr>
									<td colspan="5" align="right">Total</td>
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
							