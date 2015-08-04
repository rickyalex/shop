<?php
	$rs = $mysqli->query("SELECT * FROM items where active='1' order by date_created desc") or die(mysql_error());
	$i=0;
	$array=array();
	while($row = $rs->fetch_array(MYSQLI_ASSOC))
	{
		$array[$i]['img'] = $row['img'];
		$array[$i]['id'] = $row['id'];
		$i++;
	}
	$x=0;
	while($x < count($array)) {
		if($x==count($array)-1){
			?>
			<li class="last">
				<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
			</li>
			</ul>
			<?php
		}
		else{
			?>
			<li>
				<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
			</li>
			<?php
		}
		$x++; 
	}
?>
