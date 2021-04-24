<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MJP8/MJP8 data</title>
	<link rel="stylesheet" href="css/data.css">
</head>
<body>
	<?php
	$script = 
	"<script src=\"js/jquery.min.js\"></script>
	<script>
		$(\"ul\").css(\"padding-left\", ((($(window).width() - $(\"ul\").width()) / 2) + \"px\"));
	</script>
	";
	$json = fopen("data.json", "r") or die('File load error');
	$json_size = filesize("data.json");
	$json_data = fread($json, $json_size);
	$php_data = json_decode($json_data);
	foreach ($php_data as $php_key => $php_key_value) {
		if (gettype($php_key_value) === 'array') {
			foreach ($php_key_value as $key => $value) {
				if ($php_key_value[0] === "Malachi" && $value === "Malachi") {
					echo "<h1>$value ";
				} elseif ($php_key_value[0] === "Malachi" && $value === "Parker") {
					echo "$value</h1>";
				} elseif ($value === $php_key_value[0] && $php_key_value[0] === "HTML") {
					echo "<h3>Programming languages</h3><ul><li>$value</li>";
				} elseif ($value === $php_key_value[12] && $php_key_value[0] === "HTML") {
					echo "<li>$value</li></ul>";
				} else {
					echo "<li>$value</li>";	
				}
			}
		} else {
			echo "<h2>$php_key_value</h2>";
		}
	}
	echo $script;
	?>
</body>
</html>