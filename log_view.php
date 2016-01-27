<?php

echo "<html><head><title>View log webcam</title></head>";
echo "<body>";
echo file_get_contents('cam.log');
echo "</body></html>";


?>

