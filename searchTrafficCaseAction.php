<?php

	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Search Traffic Case</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
			body{
			  background-image: url('Images/j.jpeg');
			  background-repeat: no-repeat;
			  background-attachment: fixed;
			  background-size: cover;
			}
			.sidebar-container {
			  position: fixed;
			  width: 260px;
			  height: 100%;
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
			  padding-left: 300px;
			}
			.search{
				border:4px solid #2980b9;
				margin-left:310px;
				margin-top:12px;
				height:100%;
				width:52%;
				padding:6px 20px;
				border-radius:50px;
				font-size:18px;
				color:#424242;
				font-weight:500;
				text-align:left;
			}
			.search:focus{
				outline:none;
			}
			.btn{
				width: 80px;
				height:40px;
				margin:5px 450px 0px;
				padding: 5px;
				font-size: 18px; 
				border: 0px;
				background: #0ca5ff;
				color:  #fff;
				cursor: pointer;
				border-radius: 3px;
				outline: none;
			}
			.btn:hover{
				background: #1f78ff;
			}
			#card1{
				background-color:#212F3D;
				border-radius:10px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 60px 0 rgba(0,0,0,0.19);
				text-align:center;
				margin-left:280px;
				margin-top:-5px;
				padding-top:50px;
				color:#FDFEFE;
				opacity:0.85;
			}
			table,td,th
			{
				border:10px #F40E0A;
				align:left;
				font-size:19px;
				text-align:left;
				font-color:#040CF9;
				padding-left:40px;
				padding-right:40px;
				padding-top:18px;
				//padding-bottom:50px;
			}
			#card{
				background-color:#FFFFEF;
				margin-top:150px;
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
		   .b{
				border: 2px solid black;
				background: #1f78ff;
				border-radius: 3px;
				color:#fff;
				padding:5px;
            }
			.b:hover{
				background:#0ca5ff;
				color:#FBFCFC;
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
					  <a href="addTrafficCase.php">
						<i class="fa fa-car" aria-hidden="true"></i> Add Traffic Case
					  </a>
					</li>
					<li>
					  <a class="nav-link-active" href="searchTrafficCase.php">
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
				<form action="searchTrafficCaseAction.php" method = "get">
					<table class="elementsContainer">
						<tr>
							<td><input type="text" class="search" name="casenu" placeholder="CaseNumber / VehicleNumber"/></td>
							<td><a class="search-btn" ><i class="material-icons"></i></a></td>
						</tr>
					</table>
					<div class="inputfield">
						<input type="submit" value="Search" class="btn">
					</div>
				</form>
			<?php
					error_reporting(0);
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
					$casenu = filter_input(INPUT_GET,'casenu');
					$sql = "SELECT * FROM trafficcase WHERE caseno='$casenu' or vehicleno='$casenu'";
					$result = $conn->query($sql);
					
					echo "<table id='card1' border='2'>";
				
					if ($result->num_rows > 0) {
						
						while($row = $result->fetch_assoc()) { ?>
			 
							<tr><td>   Case Number : </td><td><?php echo $row['caseno'] ; ?></td></tr>
							<tr><td>   Vehicle Number : </td><td><?php echo $row['vehicleno']; ?></td></tr>
							<tr><td>   Name of the owner: </td><td><?php echo $row['name']; ?></td></tr>
							<tr><td>   Vehicle Type : </td><td><?php echo $row['vehicletype']; ?></td></tr>
							<tr><td>   Date: </td><td><?php echo $row['date']; ?></td></tr>;
							<tr><td>   Time : </td><td><?php echo $row['time']; ?></td></tr>;
							<tr><td>   Station ID : </td><td><?php echo $row['stationid']; ?></td></tr>
							<tr><td>   Case Type : </td><td><?php echo $row['casetype']; ?></td></tr>
							<tr><td>   Fine : </td><td><?php echo $row['fine']; ?></td></tr>
							<tr><td colspan="2" style="padding-left:180px;">
								<a class="b" href="updateTrafficCase.php<?php echo '?id='.$row['caseno']; ?>">Update</a>
							</td></tr>
						</table>
						<?php			
						}
					} 	
					else {
						echo "<div id='card'><p> Traffic Record doesnot Exist !</p><form action='searchTrafficCase.php' method='get'>
						<button type='submit' id='done'>Done</button></form></div>";	
					}
					?>
			</div>
		</div>
	<body>    
</html>