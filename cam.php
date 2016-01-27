<?php
header('Refresh:15;url=./cam.php');

include "night_cam.php";
echo tailFile('cam.log');
?>
<html>
<head>
	<title>IP Cam control</title>
	<style>

	h1 {
		color: red;
		text-align: center;
		width:100%;
	}

	input {
		width: 49%; 
		height: 100%; 
		font-size:300%;
	}
	form {
		width:100%; 
		height: 30%;
	}
	</style>
</head>
<body>
	<h1 class="h1">
		<?php
			$file_name='st';
			echo file_get_contents($file_name)."\n";
		?>
	</h1>
	<form class="form" action="status_cam.php" method="POST">
		<input class="input" name="status" type="submit" value="on" />
		<input class="input" name="status" type="submit" value="off" />
	</form>
<?php //echo tailFile('cam.log'); ?>
</body>
</html>