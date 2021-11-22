<?php

	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Search Criminal</title>
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
				width:80%;
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
				margin:5px 450px 15px;
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
				width:500px;
				height:450px;
				background-color:#212F3D;
				border-radius:10px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 60px 0 rgba(0,0,0,0.19);
				text-align:center;
				margin-left:280px;
				margin-top:-5px;
				color:#FDFEFE;
				opacity:0.85;
			}
			table,td,th
			{ 
				width:250px;
				border:10px #F40E0A;
				align:left;
				font-size:19px;
				text-align:left;
				font-color:#040CF9;
				padding-left:40px;
				padding-right:20px;
				padding-top:12px;
				padding-bottom:8px;
			}
			#card{
				background-color:#FFFFEF;
				margin-top:100px;
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
			.img-block{
				float: left; 
				margin-right: 5px; 
				text-align: center; 
				height:150px 
			}
			img{
				width: 350px; 
				height: 400px; 
				margin: 15px 30px 0px 50px; 
				box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; 
				border:1px solid black/*#f7f7f7*/;
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
			<div class="sidebar-logo">POLICE</div>
				<ul class="sidebar-navigation">
					<li class="header">Navigation</li>
					<li>
					  <a href="home.php">
						<i class="fa fa-home" aria-hidden="true"></i> Homepage
					  </a>
					</li>
					<li class="header">Police Menu</li>
					<li>
					  <a href="addCriminal.php">
						<i class="fa fa-user-plus" aria-hidden="true"></i> Add Criminal
					  </a>
					</li>
					<li>
					  <a href="addFIR.php">
						<i class="fa fa-list-alt" aria-hidden="true"></i> Add FIR
					  </a>
					</li>
					<li>
					  <a class="nav-link-active" href="searchCriminal.php">
						<i class="fa fa-search" aria-hidden="true"></i> Search Criminal
					  </a>
					</li>
					<li>
					  <a href="searchFIR.php">
						<i class="fa fa-search" aria-hidden="true"></i> Search FIR
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
				<form action="searchCriminalAction.php" method = "get">
					<table class="elementsContainer">
						<tr>
							<td><input type="text" class="search" name="cid" placeholder="Enter Criminal ID"></td>
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
				
				$cid= filter_input(INPUT_GET,'cid');
				
				$sql = "SELECT * FROM criminal WHERE criminalid='$cid'";
				$result = $conn->query($sql);
				$image_query = mysqli_query($conn,"SELECT photo,name from criminal where criminalid='$cid'");
			
				if ($result->num_rows > 0) {
					echo "<table id='card1' border='2'>";
					while($row = $result->fetch_assoc()) {
						while($rows = mysqli_fetch_array($image_query))
							{
								$img_name = $rows['photo'];
								$img_src = $rows['criminalid'];
							}
							echo"<div class='img-block'>
							<img src='UploadedImages/".$img_name." ' alt='hi' class='img-responsive' />
							</div>";?>

						  
						<tr><td>   Criminal Name: </td><td><?php echo $row['name'] ; ?></td></tr>
						<tr><td>   Criminal ID : </td><td><?php echo $row['criminalid']; ?></td></tr>
						<tr><td>   Station ID : </td><td><?php echo $row['stationid']; ?></td></tr>
						<tr><td>   Date Of Birth: </td><td><?php echo $row['dob']; ?></td></tr>
						<tr><td>   Height : </td><td><?php echo $row['height']; ?></td></tr>
						<tr><td>   Gender : </td><td><?php echo $row['gender']; ?></td></tr>
						<tr><td>   Type Of Crime : </td><td><?php echo $row['crimetype']; ?></td></tr>
						<tr><td>   Address : </td><td><?php echo $row['address']; ?></td></tr>
						
						 
				<?php			
					}
				} 
				else {
					echo "<div id='card'><p>Record does not Exist</p><form action='searchCriminal.php' method='get'>
					<button type='submit' id='done'>Done</button></form></div>";
				}
				?>
			</div>
		</div>
	<body>     
</html>
