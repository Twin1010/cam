<?php
//include "send_get.php";
include "log_cam.php";

$ip_adresses=array(
				array('name' => 'Samsung' , 'ip' => '192.168.137.33' , 'port_ssh' => 10722 ,'port_cam' => '10780', 'file' => 'Night107'),
				array('name' => 'HTC' , 'ip' => '192.168.137.33' , 'port_ssh' => 10922 ,'port_cam' => '10980', 'file' => 'Night109')
					);

function MyPing($url){
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
	if (curl_exec($ch)) {
		return true;
	} else {
		return false;
	}
	curl_close($ch);

	
/* 	
	$url = "http://".$url;
	$headd = get_headers($url);
	if (preg_match("/(.*)200\sOK/",$headd[0],$matches)) {
		//echo "Ok";
		return true;
	} else {
		return false;
	}
 */	
} // end MyPing
					
					
function ssh_exec($ip, $port, $param) {

// HTTP version

	$url = $ip.":".$port;
	// Проверка доступности хоста
	if (MyPing($url)){
	// Если доступен, то отправляем param через HTTP
		log_cam("Webcam {$ip} port {$port} is [ On-line ]",'on-line');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://{$ip}:{$port}/{$param}");
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); 
	//	$ansver = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 		$res = curl_exec($ch); 
		curl_close($ch);
//		var_dump($res);
//		print_r($res);
		return $res; 
		
	} else {
		log_cam("Webcam {$ip} port {$port} is [ Off-line ]",'off-line');
		return false;
	}

// end HTTP version

// -- функция ssh_exec с подключение через SSH   - работает, но не нужно
/* //	echo send_get($ip,$port);
	// Проверка доступности хоста в Винде или Линуксе. 
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { 
		exec ("ping -n 2 -w 200 {$ip}", $output, $status);
	} else {
		exec ("ping -c 2 -w 200 {$ip}", $output, $status);
	}
	// Если доступен, то подключаемся через SSH
	if ($status == 0) {
		log_cam(date('H:i:s')." - Webcam {$ip} port {$port} is Ok ");
		//echo "Webcam {$ip} port {$port} is Ok <br />";
		$connection = ssh2_connect($ip, $port);
		if ($connection){
			if (ssh2_auth_password($connection, 'root', 'admin')) {
				 ssh2_exec($connection, $command);
				 return true;   
			  } else {
					return false; // Не прошла проверка логина_пароля 
	//			 die('Public Key Authentication Failed');
			  }
		} else {
			log_cam(date('H:i:s')." - <b>Webcam {$ip} port {$port} is Off-line </b>");
			//echo "<b>Webcam {$ip} port {$port} is Off-line </b><br />";
			return false; // Не подключились к серверу
		}  
	} 
*/
// end с подключением через SSH
}

/* foreach ($ip_adresses as $ip_adress) {
ssh_exec($ip_adress['ip'], $ip_adress['port_ssh'], 'echo "off" > /mnt/sdcard/flagg');
} 
*/