<?php
	$rs = $mysqli->query("SELECT * FROM slider where active='1' order by date_created desc") or die(mysql_error());
		$i=0;
		$array=array();
		while($row = $rs->fetch_array(MYSQLI_ASSOC))
		{
			$array[$i]['slider_title'] = $row['slider_title'];
			$array[$i]['slider_description'] = $row['slider_description'];
			$array[$i]['img'] = $row['img'];
			$i++;
		}
	$x=0;
	while($x < count($array)) {
		?>
		<li>
			<a href="#"><img src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
			<div class="slider-info">
				<div class="product-desc">
					<h2><?php echo $array[$x]['slider_title']; ?></h2>
				    <p><?php echo $array[$x]['slider_description']; ?><br /></p>
				</div>
			</div>
		</li>
		<?php
		$x++;
	}
?>
