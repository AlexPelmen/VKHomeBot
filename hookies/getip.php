<?php 
	global $B;
	
	$ip = file_get_contents( "http://icanhazip.com/" );
	$ip = preg_replace("/[\t\r\n]+/",'',$ip); 
	$port = "80";
	
	$B->answer( "$ip:$port" );
?>
