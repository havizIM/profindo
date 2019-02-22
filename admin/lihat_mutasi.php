 
<?php 

include "../library/koneksi.php";
include "fungsi.php";
include_once("tglindo.php");
?>
<?
$tgl=date('Y-m-d');
$tgl1=$_POST['tgl1'];
$bln1=$_POST['bln1'];
$thn1=$_POST['thn1'];
$tgl2=$_POST['tgl2'];
$bln2=$_POST['bln2'];
$thn2=$_POST['thn2'];

?> 
<style type="text/css">
<!--
.style1 {font-size: 14px}
-->
</style>
<h3 align="center">Mutasi Rekening </h3>

<div align="center">DARI TANGGAL  <?php echo"$tgl1";?> / <?php echo"$bln1";?>/ <?php echo"$thn1";?> SAMPAI DENGAN TANGGAL  <?php echo"$tgl2";?> / <?php echo"$bln2";?>/ <?php echo"$thn2";?></div><br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#000000" class='table table-bordered table-striped'>
<tr>
<td width="4%" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><strong>No</strong></td>

<td width="10%" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Tanggal Transaksi</strong></td>
<td width="11%" align="center" valign="middle" bgcolor="#CCCCCC"><strong>No Rekening</strong></td>
<td width="12%" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Nama Nasabah </strong></td>

<td width="13%" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Kredit (Gram)</strong></td>
<td width="20%" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Debit (Gram)</strong></td>
<td width="15%" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Saldo</strong></td>
</tr>
<?

$ambildata=mysql_query("SELECT * FROM transaksi WHERE nama='$_SESSION[namalengkap]' AND tgl >= '$thn1-$bln1-$tgl1' AND tgl <= '$thn2-$bln2-$tgl2'");
$nomor  = 0; 
$cekdata=mysql_num_rows($ambildata);

if($cekdata=='0'){
echo "Maaf Data Yang anda cari tidak ada";
}
while($cetakdata=mysql_fetch_array($ambildata)){
$total_masuk=$cetakdata[jumlah];
$hitung+=$total_masuk;
$total_keluar=$cetakdata[keluar];
$hitung1+=$total_keluar;
$keseluruhan=$hitung-$hitung1;
$nomor++;
?>

<tr>
<td bgcolor="#FFFFFF"><span class="style1"><?php echo $nomor;?></span></td>
						
						<td bgcolor="#FFFFFF"><span class="style1"><?php echo TanggalIndo($cetakdata['tgl']);?></span></td>
						
						<td bgcolor="#FFFFFF"><span class="style1"><?php echo $cetakdata['norek'];?></span></td>
						<td bgcolor="#FFFFFF"><span class="style1"><?php echo $cetakdata['nama'];?></span></td>
						
						
						<td bgcolor="#FFFFFF"><span class="style1"><?php echo number_format($cetakdata['jumlah'],2) ?> </span></td>
						<td bgcolor="#FFFFFF"><span class="style1"><?php echo number_format($cetakdata['keluar'],2) ?> </span></td>
						<td bgcolor="#FFFFFF"><span class="style1"><?php echo number_format($keseluruhan,2) ?> Gram</span></td>
</tr>
<? } ?>

</table>
