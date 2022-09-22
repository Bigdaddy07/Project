<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Available Flights</title>
     <link rel="stylesheet" type="text/css" href="FlightAvailable.css">
     <script type="text/javascript">
         function functiontocancel(){
            location.href="./cancelbooking.php"
         }
     </script>
 </head>
 <body>
    <div class="btn">
        <input type="submit" name="Cancel" value="Cancel" class="btninput" onclick="functiontocancel()">
    </div>
    <div class="center">
    <table>
        <tr>
            <th>Airline</th>
            <th>Flight Number</th>
            <th>From</th>
            <th>To</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Book</th>
        </tr>
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
        session_start();
        $source=$_SESSION['source'];
        $destination=$_SESSION['destination'];
        $number=$_SESSION['number'];
        $date=$_SESSION['date'];
 		$sql="Select * from flightdetails where Source='".$source."' and Destination='".$destination."' and Noofpassenger>'".$number."' and date='".$date."' ";
 		$result = $con-> query($sql);
 		
 		if($result -> num_rows > 0){
 			while ($row= $result-> fetch_assoc()) {
 				
 			echo "<tr><td>".$row["Airline"]."</td><td>".$row["FlightNumber"]."</td><td>".$row["Source"]."</td><td>".$row["Destination"]."</td><td>".$row["Date"]."</td><td>".$row["Time"]."</td><td><input type=".'"Submit"'."value=".'"Book now"'."></td></tr>";
 		}
 			echo "</table>";
 	}
 	elseif(!isset($_SESSION['source'])){
        header("location:./TicketBook.php");
    }else{
 		echo "0 result";
 	}
 	$con-> close();
 }
?> 
</table>
</div>
</body>
</html>