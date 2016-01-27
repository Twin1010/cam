<?php
echo "sldfjskjdfj";
//$ch = curl_init('http://192.168.137.1/cam/cam.php');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://192.168.137.1/');
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0); 
$w = curl_exec($ch);
curl_close($ch);
//$rez = curl_getinfo($ch);
/* if ($rez){
	
	echo "On-line";
} else {
	echo "Off-line";
}
 *///echo curl_getinfo($ch, CURLINFO_HTTP_CODE);
 ?>

 

 <?php 
/*
 $url = 'http://192.168.137.33:10780/'; 

//  echo "<pre>";
print_r(get_headers($url)); 

print_r(get_headers($url, 1)); 
echo "</pre>";
// 
$headd = get_headers($url);
if (preg_match("/(.*)200\sOK/",$headd[0],$matches)) {
	
	echo "Ok";
}
*/
//?>  