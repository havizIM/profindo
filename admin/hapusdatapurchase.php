<?php

include"koneksi.php";

if( isset($_GET['id']) && isset($_GET['kd_barang'])){

    $id = $_GET['id'];
    $kd_barang = $_GET['kd_barang'];
    $queri = mysql_query("SELECT request.no_faktur, detail_request.kd_barang, detail_request.jml, tbl_barang.harga, request.total_harga FROM detail_request JOIN request ON detail_request.no_faktur= request.no_faktur JOIN tbl_barang ON detail_request.kd_barang = tbl_barang.kd_barang WHERE request.no_faktur='$id' AND detail_request.kd_barang='$kd_barang' ")or die('Ada kesalahan pada query delete request : '.mysql_error());
    $rcr=mysql_fetch_array($queri);
    $subtotalid = $rcr['jml'] * $rcr['harga'];
    $kurangtotharga = $rcr['total_harga'] - $subtotalid;

    $a ="UPDATE request SET total_harga=$kurangtotharga WHERE no_faktur='$id'";
    $updatereq = mysql_query($a);

    $query = mysql_query("DELETE FROM detail_request WHERE no_faktur='$id' AND kd_barang='$kd_barang'")or die('Ada kesalahan pada query delete request : '.mysql_error());
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');history.go(-1) </script>";
    }
    else{
        echo "gagal";
    }
}
?>