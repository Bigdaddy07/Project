<?php
	session_start();
	if(!isset($_SESSION['logged'])){
		header("Location:./LoginHtml.php");
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Tickets</title>
	<link rel="stylesheet" type="text/css" href="ViewTickets.css">
</head>
<body>
<nav>
		<span>Welcome    <?php echo($_SESSION['usrid']); ?></span>	
        <a href="logout.php">LogOut</a>
        <a href="#">View Booked Tickets</a>
        <a href="AdminPanel.php">Add Flight</a>
    </nav>
    <div class="msg">Booked Tickets will be viewed</div>
</body>
</html>