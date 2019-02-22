<?php
	session_start();
	include 'koneksi.php';
	?>
<!DOCTYPE html>
<html>
<head>

	<title>APLIKASI PEMBELIAN FURNITURE</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="" class="navbar-brand"><strong>APLIKASI PEMBELIAN FURNITURE</strong></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">

					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo ucwords($_SESSION['nama'])  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<!-- <?php
					// $periksa=mysql_query("select * from tbl_barang where jumlah <=3");
					// while($q=mysql_fetch_array($periksa)){
						// if($q['jumlah']<=3){
						// 	echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama_barang']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";
						//}
					//}
					?> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-2" style="border:1px solid #c6fafb;padding:10px;background-color:#FFFF00;">
		<div class="row">


				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">

					<img class="img-responsive" src="foto/text.png">

					</a>
				</div>

		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">

			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>

			<?php if ($_SESSION['level'] == 'admin'){?>
			<li><a href="user.php"><span class="glyphicon glyphicon-user"></span>  Data User</a></li>
			<li><a href="barang.php"><span class="glyphicon glyphicon-list"></span>  Data Barang</a></li>
			<li><a href="purchasemasukadmin.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Purchase</a></li>
			<li><a href="cetakbarang.php"><span class="glyphicon glyphicon-book"></span> Laporan Data Barang</a></li>
			<li><a href="laporanpo.php"><span class="glyphicon glyphicon-book"></span> Laporan Purchase Order</a></li>
            <li><a href="laporan.php"><span class="glyphicon glyphicon-book"></span> Laporan Pembelian</a></li>
			<?php }else if($_SESSION['level']== 'supervisor'){?>
			<li><a href="purchase.php"><span class="glyphicon glyphicon-briefcase"></span> Data Purchase Request</a></li>

			<?php }else if($_SESSION['level']== 'accounting'){?>
			<li><a href="purchasemasukaccounting.php"><span class="glyphicon glyphicon-briefcase"></span> Data Penerimaan</a></li>
            <li><a href="laporanpembayaran.php"><span class="glyphicon glyphicon-briefcase"></span> Laporan Pembayaran</a></li>
            <li><a href="laporanhutang.php"><span class="glyphicon glyphicon-briefcase"></span> Laporan Hutang</a></li>

			<?php }else if($_SESSION['level']== 'manajerkeuangan'){?>
			<li><a href="laporan.php"><span class="glyphicon glyphicon-book"></span> Laporan Pembelian</a></li>
            <li><a href=".php"><span class="glyphicon glyphicon-briefcase"></span> Laporan Pembayaran</a></li>
            <li><a href=".php"><span class="glyphicon glyphicon-briefcase"></span> Laporan Hutang</a></li>
			<?php } ?>
			<!--<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>-->
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
		</ul>
	</div>
	<div class="col-md-10">
