<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
	include('inc/statistics.php');
?>
<!DOCTYPE html">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Home | Pegashoes - The Best Indonesian Online Shoe Catalog</title>
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
			    <li><a href="#" class="active">Home</a></li>
			    <li><a href="products.php">Products</a></li>
			    <li><a href="contact.php">Pemesanan</a></li>
			</ul>
		</div>
		<!-- End Navigation -->
	</div>
	<!-- End Header -->
	
	<!-- Main -->
	<div id="main">
		<div class="cl">&nbsp;</div>
		
		<!-- Content -->
		<div id="content_index">
			
			<!-- Content Slider -->
			<div id="slider" class="box">
				<div id="slider-holder">
					<ul>
					    <?php
							include_once('display_slider.php');
					    ?>
					</ul>
				</div>
				<div id="slider-nav">
					<a href="#" class="active">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
				</div>
			</div>
			<!-- End Content Slider -->
			
			<!-- Products -->
			<div class="products_index">
				<div id="featured"></div>
				<?php
					include_once('display_featured_items.php');
				?>
			</div>
			
			<!-- End Products -->
			
		</div>
		<div class="cl">&nbsp;</div>
		<!-- End Content -->
		
		<!-- Sidebar -->
		
			
			<!-- Search -->
			
			<!-- End Search -->
			
			<!-- Categories -->
			
			<!-- End Categories -->
			
		
		<!-- End Sidebar -->
		
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
		<div class="cols">
			<div class="cl">&nbsp;</div>
			<div class="col">
				<h3 class="ico ico1">Pengiriman Paket</h3>
				<p style='text-align:justify'>Apabila stok tersedia, silahkan anda yang tentukan; jenis pengiriman kilat atau pengiriman biasa</p>
				
			</div>
			<div class="col">
				<h3 class="ico ico2">Kontak Kami</h3>
				<p style='text-align:justify'>Kami tersedia untuk dikontak via BBM atau Whatsapp untuk melayani permintaan anda</p>
				
			</div>
			<div class="col">
				<h3 class="ico ico3">Tujukan Sebagai Hadiah</h3>
				<p style='text-align:justify'>Jadikan pembelian anda sebagai hadiah untuk kesayangan anda. Kami melayani dropshipping ke tempat yang anda tentukan</p>
				
			</div>
			<div class="col col-last">
				<h3 class="ico ico4">Belanja Mudah</h3>
				<p style='text-align:justify'>Metode kami sangat simpel dan sederhana. Tanpa memerlukan login atau aktivasi akun, anda bisa langsung menghubungi kami untuk melakukan transaksi</p>
				
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Text Cols -->
        
        <!-- Text Cols -->
		<div class="cols">
			<div class="cl">&nbsp;</div>
			<div class="col">
				<h3>Pembayaran Melalui</h3>
				<img src="css/images/bank.jpg">
				
			</div>
			<div class="col">
				<h3>Jasa Pengiriman</h3>
				<img src="css/images/pengiriman.jpg">
			</div>
			<div class="col">
				<h3>Jadilah Teman Kami</h3>
				<div data-href="https://www.facebook.com/spinachstoreindonesia" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
				
			</div>
			<div class="cl">&nbsp;</div>
		</div>
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
