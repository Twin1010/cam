<?php
header('Refresh:15;url=./cam.php');

if (!file_exists('st')){
	file_put_contents('st','');
}
if (!file_exists('lamp')){
	file_put_contents('lamp','Нет');
}
include "night_cam.php";

$st_lamp = file_get_contents('lamp');
?>


<html>
<head>
	<meta charset="utf-8" />
	<title>IP Cam control</title>
	<link rel="stylesheet" href="cam-style.css" />
	<!-- <style>
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
	</style> -->
</head>
<body>
	<div class="logg">
		<p>
		<?php
			echo tailFile('cam.log');
		?>
	</p>
	</div>
	<div class="control">
		<div class="status">
			<h1 class="h1">
				<?php
					$file_name='st';
					echo file_get_contents($file_name)."\n";
				?>
			</h1>
		</div>
		<div class="btn">
			<form action="status_cam.php" method="POST">
				<input name="status" type="submit" value="on" />
				<input name="status" type="submit" value="off" /><br />
				<div class="lamp"><input name="lamp" type="submit" value="<?php echo $st_lamp;?>"/> Лампа включена<br /></div>
			</form>
	  </div>
	</div>
<!-- <?php //echo tailFile('cam.log'); ?> -->
</body>
</html>
