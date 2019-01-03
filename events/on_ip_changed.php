<?php
	global $B;
	$ip = file_get_contents( PATH_TO_MAILING."/last_ip.txt" );
	$port = "80";
	
	//to users from mailing.txt
	$users = explode( "\n", file_get_contents( PATH_TO_MAILING."/mailing.txt" ) );
	foreach( $users as $user_id )
		$B->say( $user_id, "IP адресс изменился. Теперь: http://$ip:$port" );
?>