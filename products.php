<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
	include('inc/commons.php');
	$id = isset($_GET['id']) ? $_GET['id'] : 'all';
	$cat = isset($_GET['cat']) ? $_GET['cat'] : '';
	$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Products | Pegashoes - The Best Indonesian Online Shoe Catalog</title>
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
			    <li><a href="#" class="active">Products</a></li>
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
		<div id="content">
			
			<!-- Content Slider -->
			
			<!-- End Content Slider -->
			
			<!-- Products -->
			<div class="products">
				<?php
					include_once('get_items.php');
					include_once('display_items.php');
				?>
			</div>
			<!-- End Products -->
			
		</div>
		<!-- End Content -->
		
		<!-- Sidebar -->
		<div id="sidebar">
			
			<!-- Search -->
			<?php /* 
			<div class="box search">
				<h2>Search by <span></span></h2>
				<div class="box-content">
					<form action="" method="post">
						
						<label>Keyword</label>
						<input type="text" class="field" />
						
						<label>Category</label>
						<select class="field">
							<option value="">-- Select Category --</option>
							<?php include_once('display_select_category.php'); ?>
						</select>
						
						<div class="inline-field">
							<label>Price</label>
							<input type="text" class="field-small" />
							<label>to:</label>
							<input type="text" class="field-small" />
						</div>
						
						<input type="submit" class="search-submit" value="Search" />
					</form>
				</div>
			</div>
			*/ ?>
			<!-- End Search -->
			
			<!-- Brand -->
			<div class="box categories">
				<h2>Brand <span></span></h2>
				<div class="box-content">
					<ul>
					    <?php
							include_once('display_brand.php');
						?>
					</ul>
				</div>
			</div>
			<!-- End Brand -->
			
			<!-- Categories -->
			<div class="box categories">
				<h2>Categories <span></span></h2>
				<div class="box-content">
					<ul>
					    <?php
							include_once('display_categories.php');
						?>
					</ul>
				</div>
			</div>
			<!-- End Categories -->
			
		</div>
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
