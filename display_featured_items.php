<?php
	$rs = $mysqli->query("SELECT * FROM items where active='1' and flag_featured='1' order by date_created desc") or die(mysql_error());
		$i=0;
		$array=array();
		while($row = $rs->fetch_array(MYSQLI_ASSOC))
		{
			$array[$i]['id'] = $row['id'];
			$array[$i]['description'] = $row['description'];
			$array[$i]['brand'] = $row['brand'];
			$array[$i]['price'] = $row['price'];
			$array[$i]['category'] = $row['category'];
			$array[$i]['active'] = $row['active'];
			$array[$i]['img'] = $row['img'];
			$array[$i]['flag_featured'] = $row['flag_featured'];
			$i++;
		}
	$x=1;
	while($x <= count($array)) {
		if($x==1){ //if it's the first row
			?>
			<div class="cl">&nbsp;</div>
			<ul>
				<li>
					<a href="products.php?id=<?php echo $array[$x-1]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x-1]['img'])[0].'_th.'.explode('.',$array[$x-1]['img'])[1]; ?>" alt="" /></a>
					<div class="product-info">
						<h3><?php echo $array[$x-1]['brand']; ?></h3>
						<div class="product-desc">
							<p><?php echo $array[$x-1]['description']; ?><br /></p>
							<strong class="price"><?php echo "Rp. ".number_format($array[$x-1]['price']); ?></strong>
						</div>
					</div>
				</li>
		    
			<?php
				if($x==count($array)){
			?>
			</ul>
			<div class="cl">&nbsp;</div>
			<?php
				}
		}
		else if($x % 4==0){ //the first last
			?>
			<li class="last">
				<a href="products.php?id=<?php echo $array[$x-1]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x-1]['img'])[0].'_th.'.explode('.',$array[$x-1]['img'])[1]; ?>" alt="" /></a>
				<div class="product-info">
					<h3><?php echo $array[$x-1]['brand']; ?></h3>
					<div class="product-desc">
						<p><?php echo $array[$x-1]['description']; ?><br /></p>
						<strong class="price"><?php echo "Rp. ".number_format($array[$x-1]['price']); ?></strong>
					</div>
				</div>
			<?php
				if($x==count($array)){
			?>
			</ul>
			<div class="cl">&nbsp;</div>
			<?php
				}
		}
		else{ //odd rows
			?>
				<li>
					<a href="products.php?id=<?php echo $array[$x-1]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x-1]['img'])[0].'_th.'.explode('.',$array[$x-1]['img'])[1]; ?>" alt="" /></a>
					<div class="product-info">
						<h3><?php echo $array[$x-1]['brand']; ?></h3>
						<div class="product-desc">
							<p><?php echo $array[$x-1]['description']; ?><br /></p>
							<strong class="price"><?php echo "Rp. ".number_format($array[$x-1]['price']); ?></strong>
						</div>
					</div>
				</li>
		    
			<?php
				if($x==count($array)){
			?>
			</ul>
			<div class="cl">&nbsp;</div>
			<?php
				}
		}
		
		$x++; 
	}
?>
