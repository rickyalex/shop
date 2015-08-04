<?php
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	try{
		$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$ipaddress");
		$country = $xml->geoplugin_countryName ;
	}
	catch(Exception $ex){
		$country= '';
		echo $ex;
	}
	if(!empty($_SERVER['QUERY_STRING'])){ 
		$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
		$page .= "?{$_SERVER['QUERY_STRING']}"; 
	} else $page = "";
	$referrer = "";//$_SERVER['HTTP_REFERRER']
	$datetime = time();
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$remotehost = @getHostByAddr($ipaddress);
	
	mysqli_query($mysqli,"INSERT into visitors(ipaddress,page,ref,visit_time,agent,host,country) values ('$ipaddress','$page','$referrer','$datetime','$useragent','$remotehost','$country')");
?>
