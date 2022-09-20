<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin LoggedIn</title>
	<?php
	session_start();
	if(!isset($SESSION['logged'])){
		header("Location:./LoginHtml.php");
	}
	?>
</head>
<body>
<p>Hiiii</p>
</body>
</html>