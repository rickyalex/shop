<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('../inc/commons.php');
    include(BASE_URL.'xcrud/xcrud.php');
        
	if (!function_exists('xcrud_get_instance'))
	{
		function xcrud_get_instance($name = true)
		{
			return Xcrud::get_instance($name);
		}
	}
		
    Xcrud_config::$dbname = 'shop';
	Xcrud_config::$dbuser = 'root';
	Xcrud_config::$dbpass = 'phpmyadmin777';
	Xcrud_config::$dbhost = 'localhost';
	$db = Xcrud_db::get_instance('shop');
	
	$exec = $db->query("SELECT counter from counter");
	$array = $db->result();
	$counter = $array[0]['counter'];
	
	$exec = $db->query("SELECT count(*),country from visitors group by country order by count(*) desc");
	$array = $db->result();
	$country = $array[0]['country'];
	
	$exec = $db->query("SELECT count(*) as items from items");
	$array = $db->result();
	$items = $array[0]['items'];
	
	$exec = $db->query("SELECT count(*) as count_category from (select distinct category from items group by category) as tbl1");
	$array = $db->result();
	$category = $array[0]['count_category'];
	
	$exec = $db->query("SELECT count(*) as new from (select * from items where date_created+INTERVAL 1 WEEK > NOW()) as tbl1");
	$array = $db->result();
	$new = $array[0]['new'];
	
	$exec = $db->query("SELECT (select count(*) from items where gender='MALE') as male, (select count(*) from items where gender='FEMALE') as female");
	$array = $db->result();
	$male = $array[0]['male'];
	$female = $array[0]['female'];
    
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="keywwords" content="Shop Around - Great free html template for on-line shop. Use it as a start point for your on line business. The template can be easily implemented in many open source E-commerce platforms" />
		<meta name="description" content="Shop Around - Great free html template for on-line shop. Use it as a start point for your on line business. The template can be easily implemented in many open source E-commerce platforms" />
		
		<title>Shoe Store</title>
		<?php require_once('../inc/inc_header.php'); ?>
		
		<section id="main-content">
			<section class="wrapper">
				<div class="row mt">
					<div class="col-lg-12">
					<?php
						echo "Welcome, Administrator";
					?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-aqua">
						<div class="inner">
						  <h3><?php echo $counter; ?></h3>
						  <p>Page Hits</p>
						</div>
						<div class="icon">
						  <i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-teal">
						<div class="inner">
						  <h3><?php echo $country; ?></h3>
						  <p>Most Visiting Country</p>
						</div>
						<div class="icon">
						  <i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
				</div>
				<div class="row mt">
					<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-yellow">
					<div class="inner">
					  <h3><?php echo $items; ?></h3>
					  <p>Items</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-red">
					<div class="inner">
					  <h3><?php echo $category; ?></h3>
					  <p>Unique Categories</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-purple">
					<div class="inner">
					  <h3><?php echo $new; ?></h3>
					  <p>New Items This Week</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-navy">
					<div class="inner">
					  <h3><?php echo $male; ?></h3>
					  <p>Male Items</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-maroon">
					<div class="inner">
					  <h3><?php echo $female; ?></h3>
					  <p>Female Items</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				</div>
			</section>
		</section>
	</section>
	<?php require_once('../inc/inc_footer.php'); ?>	 
     
    </body>
</html>
