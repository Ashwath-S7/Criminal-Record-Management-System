<?php

	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			body{
			  background-image: url('Images/a.jpg');
			  background-repeat: no-repeat;
			  background-attachment: fixed;
			  background-size: cover;
			}
			.sidebar-container {
			  position: fixed;
			  width: 260px;
			  height: 100%;
			  //left: 0;
			  overflow-x: hidden;
			  overflow-y: auto;
			  background: #1a1a1a;
			  color: #fff;
			}
			.sidebar-logo {
			  padding: 10px 15px 10px 50px;
			  font-size: 20px;
			  background-color: #2574A9;
			}
			.sidebar-navigation {
			  padding: 0;
			  margin: 0;
			  list-style-type: none;
			  position: relative;
			}
			.sidebar-navigation li {
			  background-color: transparent;
			  position: relative;
			  display: inline-block;
			  width: 100%;
			  line-height: 40px;
			}
			.sidebar-navigation li a {
			  padding: 10px 15px 10px 30px;
			  display: block;
			  color: #fff;
			}
			.sidebar-navigation li .fa {
			  margin-right: 10px;
			}
			.sidebar-navigation li a:active,
			.sidebar-navigation li a:hover,
			.sidebar-navigation li a:focus {
			  text-decoration: none;
			  outline: none;
			}
			.sidebar-navigation li::before {
			  background-color: #2574A9;
			  position: absolute;
			  content: '';
			  height: 100%;
			  left: 0;
			  top: 0;
			  -webkit-transition: width 0.2s ease-in;
			  transition: width 0.2s ease-in;
			  width: 3px;
			  z-index: -1;
			}
			.sidebar-navigation li:hover::before {
			  width: 100%;
			}
			.sidebar-navigation .header {
			  font-size: 12px;
			  text-transform: uppercase;
			  background-color: #151515;
			  padding: 10px 15px 10px 30px;
			}
			.sidebar-navigation .header::before {
			  background-color: transparent;
			}
			.sidebar-navigation .nav-link-active {
			  background-color: #2574A9;
			}
			.content-container {
			  padding-left: 250px;
			  padding-top:20px;
			}
			#card{
				background-color:#FFFFEF;
				margin-top:200px;
				height:200px:
				border-radius:5px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
				text-align:center;
				font-size:24px;
				padding:30px;
				margin-left:80px;
				margin-right:80px;
			}			
			#done{
				background-color: #00b300;
				color: white;
				height:50px;
				font-size:15px;
				padding: 15px 30px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			
			}	
		</style>
	</head>
	<body>
		<div class="sidebar-container">
			<div class="sidebar-logo">TRAFFIC POLICE</div>
				<ul class="sidebar-navigation">
					<li class="header">Navigation</li>
					<li>
					  <a href="home.php">
						<i class="fa fa-home" aria-hidden="true"></i> Homepage
					  </a>
					</li>
					<li class="header">Traffic Police Menu</li>
					<li>
					  <a class="nav-link-active" href="addTrafficCase.php">
						<i class="fa fa-car" aria-hidden="true"></i> Add Traffic Case
					  </a>
					</li>
					<li>
					  <a href="searchTrafficCase.php">
						<i class="fa fa-search" aria-hidden="true"></i> Search Traffic Case
					  </a>
					</li>
					<li class="header">Account</li>
					<li>
					  <a href="logout.php">
						<i class="fa fa-sign-out" aria-hidden="true"></i> Logout
					  </a>
					</li>
				 </ul>
		</div>
		<div class="content-container">
			<div class="container-fluid">
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
			
			$casenum = $_POST["casenu"];
			$vehino = $_POST["vehno"];
			$fullname = $_POST["name"];
			$vehtype = $_POST["veh"];
			$casetype = $_POST["toc"];
			$dat = $_POST["date"];
			$tim = $_POST["time"];
			$statid = $_POST["staid"];
			$fines = $_POST["fine"];

			$sql = "INSERT INTO trafficcase (caseno,vehicleno,name,vehicletype,casetype,date,time,stationid,fine) 
			VALUES ('$casenum','$vehino','$fullname','$vehtype','$casetype','$dat','$tim','$statid','$fines')";


			if ($conn->query($sql) === TRUE) {
				echo "<div id='card'><p>Traffic Case Successfully Added !</p>
						<form action='addTrafficCase.php' method='get'>
						<button type='submit' id='done'>Done</button>
						</form></div>";
			}
			 else {
				echo "<div id='card'><p>Error in adding a new Traffic Case!</p
						<p>Enter a valid StationID or unique Case Number!</p>
						<button type='submit' id='done'>Done</button>
						</form></div>";
			}

			$conn->close();
		?>
		</div>
		</div>
	</body>
</html>