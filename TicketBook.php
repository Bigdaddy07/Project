<!DOCTYPE html>
<html>
<head>
	<title>Book Ticket</title>
	<link rel="stylesheet" type="text/css" href="TicketBookCss.css">
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
 		if (isset($_POST['source'])) {
 			$source=$_POST['source'];
 			$destination=$_POST['Destination'];
 			$number=$_POST['Number'];
 			$date=$_POST['date'];

 			$sql="Select * from flightdetails where Source='".$source."' and Destination='".$destination."' and Noofpassenger>'".$number."' and date='".$date."' limit 1";
 			$check=mysqli_query($con,$sql);
 			if(mysqli_num_rows($check)==1){
 				session_start();
 				$_SESSION['logged']="true";
 				$_SESSION['source']=$source;
 				$_SESSION['destination']=$destination;
 				$_SESSION['number']=$number;
 				$_SESSION['date']=$date;
 				header("Location:./FlightAvailable.php");

 			}
 			else{
 				$msg="*No Flights Available";
 			}
 		}
 	}
 		?>
 
</head>
<body>
	 <nav>
        <a href="home.php">About us</a>
        <a href="contact.php">Contact us</a>
        <a href="LoginHtml.php">Admin login</a>
      <a href="TicketBook.php">Book a ticket</a>
      <a href="Enquiry.php">Enquiry about your ticket</a>
    </nav>
 <div class="center">
 	<h1>Find Flights</h1>
 	<form method="post" action="#">
 		<div class="fromto">
 			<label>From:</label>
 			<select name = "source">
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
 			<label>To:</label>
 			<select name="Destination">
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
 			
 		</div>
 		<div class="Noofpassenger">
 			<label>No. of Passenger:</label>
 			<select name="Number">
 				<option value="1">1</option>
 				<option value="2">2</option>
 				<option value="3">3</option>
 				<option value="4">4</option>
 			</select>
 		</div>
 		<div class="Date">
 			<label>Date Of Travel:</label>
 			<input type="date" name="date" class="datepicker">
 		</div>	
 		
 		<div class="button">
 			<input type="submit" name="find" value="Find Flights">
 		</div>
 		<div class="message">
 			<?php
 				echo($msg);
 			?>
 	</form>
 </div>
</body>
</html>