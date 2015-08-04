<?php
	$rs = $mysqli->query("SELECT distinct category FROM items where active='1'") or die(mysql_error());
		$i=0;
		$array=array();
		while($row = $rs->fetch_array(MYSQLI_ASSOC))
		{
			$array[$i]['category'] = $row['category'];
			$i++;
		}
	$x=0;
	while($x < count($array)) {
		?>
		<option><?php echo $array[$x]['category']; ?></option>
		<?php
		$x++;
	}
?>
