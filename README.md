# VKHomeBot
Home bot, to help you work with Dynamic IP

If you have dynamic ip, but you need to connect to your home server from outside - this bot can help you.
It would send you ip new adress if it have been changed. Also you can use commands for this. 
It runs on vk-sdk: <https://vk.com/dev/PHP_SDK>.

## Usage

1) Clone repo
2) Load vk-sdk with composer (use composer.json)
3) Check paths in 'homeBotProcess.sh'. This file would regulary start your scripts (long pooling and ip checker )
4) Edit 'config.php'. Write your access token of the vk group and it's id.
5) Edit 'ip_mailing/mailing.txt'. Just add the ids of users, who would get messages about changed ip.
6) Also add path to homeBotProcess.sh to '/etc/rc.local'.

So... reboot. And it must be working.

## Also

You can write your own hookies and events.
Add php-script to hookies folder. This one would be executed when any user write name of this to bot... without .php... just like command.
For example: "hru" - would execute "hookies/hru.php"

Add php-script to events folder. Name this just like "on_<name_of_event>.php". In this way you can execute this script with calling method Bot::execute_event( $event ).
Don't forget require "Bot.php")))

## I use this...
I use this to have a remote connection to my home orange pi contriller, but I don't have static ip.  
