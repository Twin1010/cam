<?php


function tailFile($filepath, $lines = 1) {
	return trim(implode("", array_slice(file($filepath), -20)));
/* 	$a = file($filepath);
	print_r ($a); echo "<br>";
	$b = array_slice($a, -5);
	print_r ($b); echo "<br>";
	return trim(implode("", $b));
 */
 }

function log_cam($message, $type='norm'){
//	echo $message.="<br />";
	switch ($type){
		case 'on-line':
			$message = date('H:i:s')." - "."<font color='green'>".$message."</font>"."<br />\n";
			break;
		case 'off-line':
			$message = date('H:i:s')." - "."<font color='brown'>".$message."</font>"."<br />\n";
			break;
		case 'send':
			$message = date('H:i:s')." - "."<font color='blue'>".$message."</font>"."<br />\n";
			break;			
		case 'error':
			$message = date('H:i:s')." - "."<font color='red'>".$message."</font>"."<br />\n";
			break;
		default:
			$message = date('H:i:s')." - ".$message."<br />\n";
			break;
	}

//	$message = date('H:i:s')." - ".$message."<br />\n";
	file_put_contents('cam.log', $message, FILE_APPEND);
}
//echo tailFile('cam.log');

/* function tailFile($filepath, $lines = 1) {
	$a = file($filepath);
//	print_r ($a); echo "<br>";
	$b = array_slice($a, 5);
//	print_r ($b); echo "<br>";
	return trim(implode("", $b));
}

function log_cam($message){
//	echo $message.="<br />";
	file_put_contents('cam.log', $message, FILE_APPEND);
}
//echo tailFile('cam.log');
 */

?>

