<?php
	session_start();
	if(!isset($_SESSION['logged'])){
		header("Location:./LoginHtml.php");
	}
	?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Admin LoggedIn</title>
	<link rel="stylesheet" type="text/css" href="AdminPanel.css">
	<?php
		$host="localhost";
		$user="root";
		$password="";
		$database="projectlogin";
		$msg="";

		$con=mysqli_connect($host,$user,$password,$database);
		if (!$con) {
			echo "Database connection failed".mysqli_connect_error();
		}
		else{
			if (isset($_POST['airline'])){
			if (!empty($_POST['airline']) && !empty($_POST['airlineno']) &&!empty($_POST['source']) &&!empty($_POST['destination']) &&!empty($_POST['datepicker']) &&!empty($_POST['seatofflights']) &&!empty($_POST['time'])) {
			 	 
				$airline=$_POST['airline'];
				$airlineno=$_POST['airlineno'];
				$source=$_POST['source'];
				$destination=$_POST['destination'];
				$datepicker=$_POST['datepicker'];
				$seatofflights=$_POST['seatofflights'];
				$time=$_POST['time'];
				
				$sql="Insert into flightdetails values('$source','$destination','$seatofflights','$datepicker','$airlineno','$airline','$time')";

				$check=mysqli_query($con,$sql);
				$msg="Insertion Success";
			}
else{
	$msg="*Please Fillout All Details";
}
			}
		
		}
	?>
</head>
<body>
<nav>
		<span>Welcome    <?php echo($_SESSION['usrid']); ?></span>
        <a href="logout.php">LogOut</a>
        <a href="ViewTickets.php">View Booked Tickets</a>
        <a href="#">Add Flight</a>
    </nav>
<div class="center">
	<h1>Add New Flight</h1>
	<form method="post" action="#">
	<div class="airline">
		<label>Airline:</label>
		<input type="text" name="airline" class="airlineinput">
	</div>
	<div class="Flightno">
		<label>FlightNumber:</label>
		<input type="text" name="airlineno" class="Flightnoinput">
	</div>
	<div class="from">
		<label>Source:</label>
		<select name = "source">
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
	<label>To:</label>
		<select name = "destination">
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
	</div>
	<div class="dateoftravel">
		<label>Date:</label>
		<input type="date" name="datepicker" class="dateinput">
	</div>
	<div class="totalseats">
		<label>Total Seats</label>
		<input type="number" name="seatofflights" class="seatinput">
	</div>
	<div class="time">
		<label>Time:</label>
		<input type="time" name="time" class="timeinput">
	</div>
	<div class="btn">
		<input type="submit" name="Addflight" value="Add New Flight" class="addflight" >
	</div>
	<div class="errormsg">
		<?php
		echo($msg);
		?>
	</div>
</div >

	</form>
</body>
</html>