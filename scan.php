<?php
	require __DIR__ . "/Bot.php";
	$B = new Bot( GROUP_ID, ACCESS_TOKEN );
	
	$vk->groups()->setLongPollSettings( ACCESS_TOKEN, array(
	  'group_id'      => GROUP_ID,
	  'enabled'       => 1,
	  'message_new'   => 1
	));
	
	//overwritten callbacks
	class CallbackApiMyHandler extends VK\CallbackApi\VKCallbackApiHandler {
		public function messageNew( int $group_id, ?string $secret, array $object) {
			global $B;
			$B->received = $object;
			if( ! $B->execute_command( $object['body'] ) )
				$B->on_unknown_command();			
		}
	}
	
	$handler = new CallbackApiMyHandler();
	$executor = new VK\CallbackApi\LongPoll\VKCallbackApiLongPollExecutor($vk, ACCESS_TOKEN, GROUP_ID, $handler, LONG_POOL_WAIT);
	$executor->listen();
?>