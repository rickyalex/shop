<?php
	$rs = $mysqli->query("SELECT distinct brand FROM items where active='1'") or die(mysql_error());
	$i=0;
	$array=array();
	while($row = $rs->fetch_array(MYSQLI_ASSOC))
	{
		$array[$i]['brand'] = $row['brand'];
		$i++;
	}
	$x=0;
	while($x < count($array)) {
		if($x==count($array)+1){
			?>
			<li class="last"><a href="products.php?id=all&brand=<?php echo $array[$x]['brand']; ?>"><?php echo $array[$x]['brand']; ?></a></li>
			<?php
		}
		?>
		<li><a href="products.php?id=all&brand=<?php echo $array[$x]['brand']; ?>"><?php echo $array[$x]['brand']; ?></a></li>
		<?php
		$x++;
	}
?>
