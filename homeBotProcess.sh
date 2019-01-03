while true
do
	#Server
   	php /var/www/html/VKhomeBot/scan.php 2>&1 log
   	php /var/www/html/VKhomeBot/ip_mailing/scan_ip.php 2>&1 log
done
