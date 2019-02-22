<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-list"></span><strong> Laporan Transaksi</strong></h3>


<a onclick=window.location.href='../admin/laporanharian.php'><button style="margin-bottom:40px" class="btn btn-outline btn-primary">Laporan Harian</button></a></td>

<a onclick=window.location.href='../admin/laporanbulanan.php'><button style="margin-bottom:40px" class="btn btn-outline btn-primary">Laporan Bulanan</button></a></td>

<a onclick=window.location.href='../admin/laporantahunan.php'><button style="margin-bottom:40px" class="btn btn-outline btn-primary">Laporan Tahunan</button></a>


<table  class="table table-bordered">
        <thead>
		
                                    <tr class="info">
                                        <th>No.</th>
                                        <th>Tanggal</th>
										<th>Kode Barang</th>
                                        <th>Nama Tepung</th>
                                        <th>Jumlah</th>
                                        <th>Harga Tepung</th>
										<th>Total Harga</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								//Koneksi Ke server Database
								include "../admin/koneksi.php";
								$sqltbl_gudang   = "select * from transaksi,barang where transaksi.kode_brg=barang.kode_brg order by transaksi.id_transaksi ASC"; 
								$querytbl_gudang = mysql_query($sqltbl_gudang);
								$no = 1;
								while($datatbl_gudang = mysql_fetch_array($querytbl_gudang))
								{
								$total_harga=$datatbl_gudang['harga']*$datatbl_gudang['jml'];
									echo "<tr>";
									echo "<td>$no</td>";
									echo "<td>$datatbl_gudang[tgl]</td>";
									echo "<td>$datatbl_gudang[kode_brg]</td>";
									echo "<td>$datatbl_gudang[nama]</td>";
									echo "<td>$datatbl_gudang[jml]</td>";
									echo "<td>$datatbl_gudang[harga]</td>";
									echo "<td>$total_harga</td>";
								?>
								
								</tr>
								</tr>
								<?php
								$no++;
								}	
							    ?>
								
                                  
                                    
        </tbody>
    </table>

<?php 
include 'footer.php';

?>