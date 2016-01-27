<?php
//header('Refresh: 1; url=./test.php');

// if ((date('Hi') == $period) || (date('Hi') <= $period+2)) && (file_get_contents("./st") == 'on')){
$period = 900;
if (($period <= date('Hi')) && (date('Hi') <= $period+1)){
header('Refresh: 1; url=./test.php');
	echo "<h1>".date('H:i:s')." </h1>";
} else {
	echo "<h1>"."End"." </h1>";
}

?>
