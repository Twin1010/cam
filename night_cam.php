<?php
//echo date('Hi');
include "ssh_cam.php";

// /settings/night_vision?set=on
// /settings/night_vision?set=off
// /settings/night_vision_gain?set=24  - 7:12
// /settings/night_vision_gain?set=7  - 9:00
// /settings/night_vision_gain?set=17  - 17:00

$cam_gain = array(
    '711'  => array( 'Samsung' => '12' , 'HTC' => '9'),
    '901'  => array( 'Samsung' => '7'  , 'HTC' => '5'),
    '1630' => array( 'Samsung' => '7'  , 'HTC' => '2')
//	,'2008' => array( 'Samsung' => '7'  , 'HTC' => '2')
                                );

								
function set_night_cam($period,$gain,$hour_lable,$sw){

//	 if ((date("Hi") == $period) && (file_get_contents("st") == 'on')){
	if ((($period <= date('Hi')) && (date('Hi') <= $period+1)) && (file_get_contents("./st") == 'on')){
// echo "wer";
		global $ip_adresses;
		global $cam_gain;
		foreach ($ip_adresses as $ip_adress) {

			if (!file_exists($ip_adress['file'])){
				file_put_contents($ip_adress['file'],'');
			}
			if (file_get_contents($ip_adress['file']) != $hour_lable){
//				echo "add";
				log_cam("-----------------------------------------");
				if (ssh_exec($ip_adress['ip'], $ip_adress['port_cam'], "settings/night_vision?set={$sw}")){
					log_cam("Night: Sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_{$sw} ]");
					// echo date('H:i:s')." - "."Night: Sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_{$sw} ] <br>";
					if ($sw === 'on'){
						$gain = $cam_gain[$hour_lable][$ip_adress['name']];
						if (ssh_exec($ip_adress['ip'], $ip_adress['port_cam'], "settings/night_vision_gain?set={$gain}")) {
							log_cam("Night: Sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_gain = {$gain} ]");
							// echo date('H:i:s')." - "."Sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_gain = {$gain} ]<br />";
							file_put_contents($ip_adress['file'],$hour_lable);
						} else {
							log_cam("Night: Error sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_gain = {$gain} ]",'error');
							// echo date('H:i:s')." - "."Night: Error sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_gain = {$gain} ]<br>";
						}
					}
				} else {
					log_cam("Night: Error sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_{$sw} ]",'error');
					// echo date('H:i:s')." - "."<b>Night: Error sent to {$ip_adress['ip']} port {$ip_adress['port_cam']} [ night_{$sw} ]</b><br>";
				}
			}
		}
	}
} //end set_night_cam


set_night_cam('711' ,'12','711'   ,'on' ); // 07:11 on gain=12 hour=7
set_night_cam('900' ,'7' ,'901'   ,'on' ); // 09:00 on gain=7 hour=9
set_night_cam('1000','1' ,'1040','off'); // 10:40 OFF gain=1 hour=1040
//set_night_cam('1700','10','1630'  ,'on' ); // 16:30 on gain=10 hour=1630
//set_night_cam('2008','8','4444','on'); // test


?>

