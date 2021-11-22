<?php

	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: Gray;
			}
			li {
				float: right;
			}
			li a {
				display: block;
				color: white;
				font-size:20px;
				text-align: center;
				padding: 16px 20px;
				margin-top:10px;
				margin-bottom:20px;
				text-decoration: none;
			}
			li a:hover:not(.active) {
				background-color: #cccccc;
				color:black
			}	
			#card{
				background-color:#FFFFEF;
				margin:150px;
				height:150px:
				border-radius:5px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
				text-align:center;
				font-size:24px;
				padding:25px;
				margin-left:200px;
				margin-right:200px;
			}			
			#done{
				background-color: #00b300;
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			
			}	
		</style>
	</head>
	<body>
		<ul>
			<li><a href="adminLoginPage.php"><strong>Admin</strong></a></li>
			<li><a href="home.php"><strong>Home</strong></a></li>
		</ul>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname ="criminaldb";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$un = $_POST["usern"];
			$pass = $_POST["passw"];
			
			$sql = "SELECT a.* FROM authentication a,station s WHERE s.stationtype='trafficpolice' AND s.username='$un' AND 
					a.username='$un' AND a.password='$pass'";
			$result = $conn->query($sql);
			$n = $result->num_rows;

			if ($result->num_rows > 0) {
				$_SESSION["loggedin"]="traffic";
				header("Location: addTrafficCase.php");	
			}
			else {
				echo "<div id='card'>
						<p>Invalid Id or Password!!!</p>
						<p>Try again with valid Id and Password</p>
						<form action='traffPLoginPage.php' method='post'>
							<button type='submit' id='done'>Done</button>
						</form>
					</div>";
			}
		?>
	</body>
</html>