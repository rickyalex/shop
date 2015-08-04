<?php
	$rs = $mysqli->query("SELECT * FROM slider where active='1'") or die(mysql_error());
		$i=0;
		while($row = $rs->fetch_array(MYSQLI_ASSOC))
		{
			$array[$i]['active'] = $row['active'];
			$array[$i]['img'] = $row['img'];
			$i++;
		}
		
	$x=0;
?>
