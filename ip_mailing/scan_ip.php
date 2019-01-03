<?php 	
	$last = file_get_contents( __DIR__ . "/last_ip.txt" );				//last ip adress
	$cur = file_get_contents( "http://icanhazip.com/" );				//current ip adress
	$cur = preg_replace("/[\t\r\n]+/",'',$cur);	
	$port = "80";
			
	if( $last != $cur && $cur ){	//ip changed	
		file_put_contents( __DIR__ . "/last_ip.txt", $cur );	
		
		//call event
		require dirname( __DIR__ )."/Bot.php";
		$B = new Bot( GROUP_ID, ACCESS_TOKEN );
		$B->execute_event( "ip_changed" );		
	}
?>
