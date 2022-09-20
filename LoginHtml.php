 
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title> Login </title>
 	<link rel="stylesheet" type="text/css" href="Logincss.css">
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
 		if(isset($_POST['userid'])){
 			$usrid = $_POST['userid'];
 			$pass=$_POST['password'];

 			$sql ="Select * from logindetail where UserID='".$usrid."' and Password='".$pass."' limit 1";
 			$check = mysqli_query($con,$sql);
 			if(mysqli_num_rows($check)==1){
 				session_start();
 				$_SESSION['logged']="true";
 				$_SESSION['usrid']=$usrid;
 				header("Location: http://www.youtube.com/");
 				exit();
 			}	
 			else{
 				$msg="Invalid UserID or Password";
 			}
 			 		}
 	}
 	?>
 </head>
 <body>
 		<div class="center">
 			<h1>Login</h1> 
 			<form method="#">
 				<div class="txt_field">
 					<input type="text" placeholder="Enter UserID" name="userid" required>
 				</div>
 				<div class="txt_field">
 					<input type="password" placeholder="Enter Password" name="password" id="password" required>
 				</div>
 				<div class="Errormsg">
 					<?php
 						echo ($msg);
 					?>
 				</div>
 				<div class="showpassword" >

 					<input type="checkbox" onclick="toShowPassword()" >
 					<label>Show Password</label>
 					<script type="text/javascript">
 					function toShowPassword(){
 					var x = document.getElementById("password");
 					if (x.type==="password") {
 						x.type="text";
 					}
 					else{
 						x.type="password";
 					}
 				}
 				</script>
 				</div>
 				<input type="submit" value="Login" class="submitbtn">
 			</form>
 </body>
 </html>