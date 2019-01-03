<?php
	require __DIR__ . "/vendor/autoload.php";
	require __DIR__ . "/config.php";
	
	use VK\Client\VKApiClient;	
	$vk = new VKApiClient('5.80');
	
	class Bot{
		public			
			$received,	//recieved message			
			$group_id,	//group id
			$access_token; //access token
			
		public function __construct( $gr, $access ){
			$this->group_id = $gr;
			$this->access_token = $access;
		}
			
		//connect php file in hookies folder 
		public function execute_command( $cmd ){			
			return @include_once( PATH_TO_HOOKIES."/$cmd.php" );	
		}
		
		//connect php file in events folder
		function execute_event( $event ){			
			return @include( PATH_TO_EVENTS."/on_$event.php" );				 
		}
		
		//event unknown command
		public function on_unknown_command(){
			$this->execute_command( "unknown_command" );		
		}
		
		//write message to user
		public function say( $user_id, $text ){
			global $vk;
			$vk->messages()->send( $this->access_token, array( 
				"user_id" => $user_id,
				"message" => $text
			) );
		}
		
		//write message to user who write to use
		public function answer( $text ){
			$this->say( $this->received[ "user_id" ], $text );
		}
	}
	
	
	
?>