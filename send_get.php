<?php

$ip_adresses=array(
				array('ip' => '192.168.137.114', 'port_ssh' => 10922 ,'port_cam' => '10980', 'file' => 'Night109'),
				array('ip' => '192.168.137.33' , 'port_ssh' => 10722 ,'port_cam' => '10780', 'file' => 'Night107'),
				array('ip' => '192.168.137.33' , 'port_ssh' => 10922 ,'port_cam' => '10980', 'file' => 'Night109')
					);

function MyPing($url){
	$headd = get_headers($url);
	if (preg_match("/(.*)200\sOK/",$headd[0],$matches)) {
		//echo "Ok";
		return true;
	} else {
		return false;
	}
	
} // end MyPing

function send_get($ip,$port ,$param = ""){
	$url = $ip.":".$port;
	// Проверка доступности хоста
	if (MyPing($url)){
	// Если доступен, то отправляем param через HTTP
		log_cam(date('H:i:s')." - Webcam {$ip} port {$port} is Ok ");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://{$ip}:{$port}/{$param}");
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); 
	//	$ansver = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 		curl_exec($ch);
		curl_close($ch);
		
		return true; 
		
	} else {
		return false;
	}
/* 		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://{$ip}:{$port}/{$param}");
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); 
//		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		$ansver = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

 		curl_exec($ch);
//
echo "http://{$ip}:8080/{$param}"; // test
$ansver = file_get_contents('ok');
//
		curl_close($ch);
		return $ansver;
 */
} // end send_get()

/* $ip_cameras=array(
					array('ip' => '192.168.0.107', 'file' => 'Night107'),
					array('ip' => '192.168.0.109', 'file' => 'Night109')
									);
 */
?>