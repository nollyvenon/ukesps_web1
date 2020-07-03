<?php
function logthishit ($sessionid, $admin_fullname, $pagevisited, $ip, $browser, $refer)
{
$log = fopen("log.txt","a");

$countryfile = fopen("http://ip-to-country.com/gert-country/?ip=$ip&user=guest&password=guest","r");
$country = fgets($countryfile,50);
fclose($countryfile);
	$now = date("d F Y h:i:s A");

fwrite($log,"$admin_fullname --> $now,$sessionid,$pagevisited,$ip,$country,$browser,$refer\r\n");
$log = fclose($log);
}

?>