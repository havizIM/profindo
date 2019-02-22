<body onLoad="window.print()">
<?php
include "../admin/koneksi.php";
?>	
	
	
	<h3 align="center" >PT. BUMI SARIMAS INDONESIA</h2>
	<h5 align="center" >Jln. Raya Padang Bukik Tinggi KM. 21 Kabupaten Pdang Pariaman</h3>
	<hr align="center" width="100%">
	<h2 align="center">Laporan Persediaan Tepung </h2>
							<table align="center" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th >No</th>
										<th >Kode Barang</th>
                                        <th >Tepung</th>
                                        <th >Modal</th>
                                        <th >Harga Jual</th>
                                        <th >Jumlah</th>
										</tr>
                                </thead>
                                <tbody>
                                    <?php 
                                //Koneksi Ke server Database
                                $sql   = "select * from barang order by id ASC";
                                $querry = mysql_query($sql);
                                $no = 1;
                                while ($data = mysql_fetch_array($querry))
                                {
                                    echo "<tr>";
                                    echo "<td align='center'>$no</td>";
									echo "<td align='center'>$data[kode_brg]</td>";
                                    echo "<td align='center'>$data[nama]</td>";
                                    echo "<td align='center'>$data[modal_beli]</td>";
                                    echo "<td align='center'>$data[harga]</td>";
                                    echo "<td align='center'>$data[jumlah]</td>";
                                ?>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                                </tbody>
                            </table>
							<br>
                              