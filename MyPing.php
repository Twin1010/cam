<?php
$ch = curl_init('http://192.168.137.1');
curl_setopt($ch, CURLOPT_NOBODY, true);
//curl_setopt($ch, CURLOPT_HEADER, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//$c = curl_exec($ch);
// echo curl_getinfo($ch, CURLINFO_HTTP_CODE);
// curl_getinfo($ch);
/*echo "<pre>start<br />";
var_dump ($c);
print_r($c);
echo $c;
//var_dump(curl_getinfo($ch));
echo "</pre>stop";
*/
//echo $headers['http_code'];
if (curl_exec($ch)) {
//if ($c) {
  echo "On-line";
} else {
  echo "Off-line";
}
curl_close($ch);
?>