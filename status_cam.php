<?php

include "ssh_cam.php";

//header('Refresh:1;url=./cam.php');
header('Location: cam.php');

$file_name='st';

if (isset($_POST['lamp'])) {
	$st=$_POST['lamp'];

	if ($st == 'Нет'){
		file_put_contents('lamp','Да');
	} else {
		file_put_contents('lamp','Нет');
	}
}

if (isset($_POST['status'])){
	$st=$_POST['status'];

	if (($st == "off") || ($st == "on")) {
		file_put_contents($file_name, $st);

		foreach ($ip_adresses as $ip_adress) {
			log_cam("-----------------------------------------");
			if (ssh_exec($ip_adress['ip'], $ip_adress['port_ssh'], "index.php?status={$st}")){
				log_cam("Webcam {$ip_adress['ip']} port {$ip_adress['port_ssh']} is [ {$st} ]",'send');
				// echo date('H:i:s')." - "."Webcam {$ip_adress['ip']} port {$ip_adress['port_ssh']} is [ {$st} ]<br />";
			} else {
				log_cam("Error [ send {$st} ] Webcam {$ip_adress['ip']} port {$ip_adress['port_ssh']}",'error');
				// echo date('H:i:s')." - "."<b>Error [ send {$st} ] Webcam {$ip_adress['ip']} port {$ip_adress['port_ssh']}</b><br />";
			}
		}
	}
}

//echo file_get_contents($file_name);
?>
