<?php 
?>
	
	<!-- Bootstrap core CSS -->
		<link href="<?php echo BASE_URL ?>css/bootstrap.css" rel="stylesheet">
		<!--external css-->		
		<link href="<?php echo BASE_URL ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo BASE_URL ?>css/morris-0.4.3.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>js/bootstrap-fileupload/bootstrap-fileupload.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>js/bootstrap-datepicker/css/datepicker.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>js/bootstrap-daterangepicker/daterangepicker.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>js/bootstrap-timepicker/compiled/timepicker.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>js/bootstrap-datetimepicker/datertimepicker.css" />
			
		<!-- Custom styles for this template -->
		<link href="<?php echo BASE_URL ?>css/style.css" rel="stylesheet">
		<link href="<?php echo BASE_URL ?>css/style-responsive.css" rel="stylesheet">
		<link href="<?php echo BASE_URL ?>datatables/media/css/jquery.dataTables.css" rel="stylesheet">
		<link href="<?php echo BASE_URL ?>datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" />
		<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
		
		
		<!-- JS -->
		<script src="<?php echo BASE_URL ?>js/morris-0.4.3.min.js"></script>		
		<!-- js placed at the end of the document so the pages load faster -->
		<script src="<?php echo BASE_URL ?>js/jquery.js"></script>
		<script src="<?php echo BASE_URL ?>js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL ?>js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="<?php echo BASE_URL ?>js/jquery.scrollTo.min.js"></script>
		<script src="<?php echo BASE_URL ?>js/jquery.nicescroll.js" type="text/javascript"></script>


	  <!--common script for all pages-->
		<script src="<?php echo BASE_URL ?>js/raphael-min.js"></script>
		<script src="<?php echo BASE_URL ?>js/morris-0.4.3.min.js"></script>		
	  <script src="<?php echo BASE_URL ?>js/common-scripts.js"></script>

		<!--script for this page-->
		<!-- End JS -->
		
		
	</head>
	<body>
	<section id="container" >
		<header class="header black-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>
			<!--logo start-->
			<a href="#" class="logo"><b>Administrator Page</b></a>
			<!--logo end-->
			<div class="top-menu">
				<ul class="nav pull-right top-menu">
					<li><button type="button" class="logout" data-toggle="dropdown">
						<?php echo "Administrator";?> 
						<span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
								<a href="#">Change Password</a>
							</li>
							<li>
								<a href="#">Logout</a>
							</li>
						  </ul>
					</li>
				</ul>
			</div>
		</header> 
		<aside>
			<div id="sidebar"  class="nav-collapse ">
				<!-- sidebar menu start-->
				<?php //include(dirname(__FILE__).'/menu.php') ?>
				<ul class="sidebar-menu" id="nav-accordion">  
					<p class="centered"><a href="#"><img src="#" class="img-circle" width="60"></a></p>
					<h5 class="centered"><?php echo "Administrator";?></h5>	
					<li class="#">
						<a href="<?php echo BASE_URL ?>">
							<i class="fa fa-dashboard"></i>
							<span>View Your Web</span>
						</a>
					</li>
					<li class="#">
						<a href="<?php echo BASE_URL ?>admin/dashboard.php">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li class="#">
						<a href="<?php echo BASE_URL ?>admin/items.php">
							<i class="fa fa-dashboard"></i>
							<span>Items</span>
						</a>
					</li>
					<li class="#">
						<a href="<?php echo BASE_URL ?>admin/slider.php">
							<i class="fa fa-dashboard"></i>
							<span>Slider</span>
						</a>
					</li>
				</ul>			  
				<!-- sidebar menu end-->
			</div>
		</aside>
<?php
?>
