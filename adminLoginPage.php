<?php

	session_start();
	
	if(isset($_SESSION["loggedin"])){
		if($_SESSION["loggedin"]==="police"){
			header("Location:addCriminal.php");
		}
		if($_SESSION["loggedin"]==="traffic"){
			header("Location:addTrafficCase.php");
		}
		if($_SESSION["loggedin"]==="admin"){
			header("Location:addPoliceStation.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Login Page</title>
		<link rel="stylesheet" type="text/css" href="lP.css">
		</link>
	</head>
	<body>
		<div class="container">
			<h2>Login</h2>
			<form action="adminLP_action.php" method="post">
				<label for="username">Username</label>
				<input type="text" id="username" name="usern" placeholder="Username" required>
				<label for="pwd">Password</label>
				<input type="password" id="password" name="passw" placeholder="Password" required>
				<button type="submit"><span>login</span></button>
			</form>
		</div>
	</body>
</html>