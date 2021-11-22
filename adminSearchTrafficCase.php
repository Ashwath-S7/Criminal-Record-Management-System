<?php

	session_start();
	
	if(isset($_SESSION["loggedin"])){
		if($_SESSION["loggedin"]==="police"){
			header("Location:addCriminal.php");
		}
		if($_SESSION["loggedin"]==="traffic"){
			header("Location:addTrafficCase.php");
		}
	}

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
			  padding-left: 300px;
			  padding-top:10px;
			}
			.search{
				border:4px solid #2980b9;
				margin-left:350px;
				margin-top:20px;
				height:100%;
				width:50%;
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
				margin:5px 450px;
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
		</style>
	</head>
	<body>
		<div class="sidebar-container">
			<div class="sidebar-logo">ADMIN</div>
				<ul class="sidebar-navigation">
					<li class="header">Navigation</li>
					<li>
					  <a href="home.php">
						<i class="fa fa-home" aria-hidden="true"></i> Homepage
					  </a>
					</li>
					<li class="header">Admin Menu</li>
					<li>
					  <a href="addPoliceStation.php">
						<i class="fa fa-id-card" aria-hidden="true"></i> Add Police Station
					  </a>
					</li>
					<li>
					  <a href="adminSearchCriminal.php">
						<i class="fa fa-search" aria-hidden="true"></i> Search Criminal
					  </a>
					</li>
					<li class="nav-link-active">
					  <a href="adminSearchTrafficCase.php">
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
				<form action="adminSearchTrafficCaseaction.php" method = "get">
					 <table class="elementsContainer">
						<tr>
							<td><input type="text" class="search" name="casenu" placeholder="CaseNumber / VehicleNumber"></td>
							<td><a class="search-btn" ><i class="material-icons"></i></a></td>
						</tr>
					</table>
					 <div class="inputfield">
						<input type="submit" value="Search" class="btn">
					 </div>
				</form>
			</div>
		</div>
	</body>
</html>