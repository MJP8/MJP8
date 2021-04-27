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
	$json = fopen("data.json", "r") or die('File load error');
	$json_size = filesize("data.json");
	$json_data = fread($json, $json_size);
	$php_data = json_decode($json_data);
	foreach ($php_data as $php_key => $php_key_value) {
		if (gettype($php_key_value) === 'array') {
			foreach ($php_key_value as $key => $value) {
				if ($php_key === "name" && $key === 0) {
					echo "<h1>$value ";
				} elseif ($php_key === "name" && $key === count($php_key_value) - 1) {
					echo "$value</h1>";
				} elseif ($php_key === "programming_langs" && $key === 0) {
					echo "<h3>Programming languages</h3><ul class=\"langs\"><li>$value</li>";
				} elseif ($php_key === "programming_langs" && $key === count($php_key_value) - 1) {
					echo "<li>$value</li></ul>";
				} elseif ($php_key === "fav_langs" && $key === 0) {
					echo "<h3>Favorite programming languages</h3><ul class=\"favs\"><li>$value</li>";
				} elseif ($php_key === "fav_langs" && $key === count($php_key_value) - 1) {
					echo "<li>$value</li></ul>";
				} else {
					echo "<li>$value</li>";	
				}
			}
		} else {
			echo "<h2>$php_key_value</h2>";
		}
	}
	?>
	<script src="js/jquery.min.js"></script>
	<script>
		$("ul").css("padding-left", ((($(window).width() - $("ul").width()) / 2) + "px"));
	</script>
</body>
</html>