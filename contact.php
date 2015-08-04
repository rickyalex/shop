<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
	include('inc/commons.php');
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pemesanan | Pegashoes - The Best Indonesian Online Shoe Catalog</title>
	<link rel="stylesheet" href="css/style_original.css" type="text/css" media="all" />
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	
	<meta name="keywwords" content="Pegashoes" />
	<meta name="description" content="Pegashoes - The Best Indonesian Online Shoe Catalog" />
	
	<!-- JS -->
	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>	
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>	
	<script src="js/jquery-func.js" type="text/javascript"></script>
	<!-- End JS -->
	
	
</head>
<body>
	
<!-- Shell -->	
<div class="shell">
	
	<!-- Header -->	
	<div id="header">
		<h1 id="logo"><a href="#">shoparound</a></h1>	
		
		<!-- Cart -->
		<div id="cart">
			<a href="#" class="cart-link">Order By</a>
			<div class="cl">&nbsp;</div>
			<span>BBM: <strong>48B45A1</strong></span>
			<div class="cl">&nbsp;</div>
			<span>SMS: <strong>+62 81234567890</strong></span>
		</div>
		<!-- End Cart -->
		
		<!-- Navigation -->
		<div id="navigation">
			<ul>
			    <li><a href="index.php">Home</a></li>
			    <li><a href="products.php">Products</a></li>
			    <li><a href="#" class="active">Pemesanan</a></li>
			</ul>
		</div>
		<!-- End Navigation -->
	</div>
	<!-- End Header -->
	
	<!-- Main -->
	<div id="main">
		
		<!-- Contact -->
		<div id="contact">
			<span class="info">
				<p>KONTAK KAMI</p><br>
				<span>BBM: <strong>48B45A1</strong></span>
				<div class="cl">&nbsp;</div>
				<span>SMS: <strong>+62 81234567890</strong></span><br><br>
				
				<p>CARA PEMESANAN</p><br>
				<ol type='1'>
					<li>
						Cari produk yang sesuai dengan keinginan anda, tentukan nama model, warna dan ukuran dengan format sbb : MODEL[SPASI]WARNA[SPASI]UKURAN
					</li>
					<li>
						Kemudian hubungi kami melalui kontak diatas. Kami akan cek stok ke gudang, apabila stok tersedia maka anda akan kami berikan detail barang beserta kode unik untuk pemrosesan berikutnya
					</li>
					<li>
						Apabila anda ingin melanjutkan transaksi, maka balas dengan format sbb : NAMA ANDA[SPASI]ALAMAT[SPASI]NO HP[SPASI]KODE UNIK
					</li>
					<li>
						Setelah kami menerima data-data tersebut, akan kami beri data lengkap transaksi anda beserta nomor rekening kami dan harga yang harus dibayarkan. 3 angka terakhir pada harga adalah kode unik yang anda dapatkan sebagai pengidentifikasian kami atas pesanan anda
					</li>
					<li>
						Balas SMS tersebut apabila sudah melakukan transfer, apabila transfer sudah kami terima maka kami akan langssung mengirimkan paket tersebut
					</li>
					<li>
						Selamat Berbelanja !
					</li>
				</ol>
				<br><br>
				
			</span>
		</div>
		<!-- End Contact -->
		
		
		
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	
	<!-- Side Full -->
	<div class="side-full">
		
		<!-- More Products -->
		<div class="more-products">
			<div class="more-products-holder">
				<ul>
				    <?php
						include_once('display_more_products.php');
				    ?>
				</ul>
			</div>
			<div class="more-nav">
				<a href="#" class="prev">previous</a>
				<a href="#" class="next">next</a>
			</div>
		</div>
		<!-- End More Products -->
		
		<!-- Text Cols -->
		
		<!-- End Text Cols -->
		
	</div>
	<!-- End Side Full -->
	
	<!-- Footer -->
	<div id="footer">
		<p class="left">
			<a href="#">Home</a>
			<span>|</span>
			<a href="#">Products</a>
			<span>|</span>
			<a href="#">Pemesanan</a>
			<span>|</span>
		</p>
		<p class="right">
			&copy; 2015 Pegashoes.
			Design by <a href="#" target="_blank" title="Your Data Solution Provider">LEXA Media</a>
		</p>
	</div>
	<!-- End Footer -->
	
</div>	
<!-- End Shell -->
	
</body>
</html>
