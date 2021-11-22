<?php

	session_start();
	
	if(isset($_SESSION["loggedin"])){
		if($_SESSION["loggedin"]==="police"){
			header("Location:addCriminal.php");
		}
		if($_SESSION["loggedin"]==="admin"){
			header("Location:addPoliceStation.php");
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>New Traffic Case</title>
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
			  padding:15px 300px;
			}
			.wrapper{
			  max-width: 500px;
			  width: 100%;
			  background-color: white;
			  /*opacity: 90%;*/
			  margin: 20px 240px;
			  z-index: -1;
			  border-radius: 5px;
			  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
			  padding: 30px;
			}

			.wrapper .title{
			  font-size: 24px;
			  font-weight: 700;
			  margin-bottom: 25px;
			  color: #0ca5ff/*#fec107*/;
			  text-align: center;
			}

			.wrapper .form{
			  width: 100%;
			}

			.wrapper .form .inputfield{
			  margin-bottom: 10px;
			  display: flex;
			  align-items: center;
			}

			.wrapper .form .inputfield label{
			  width: 200px;
			  margin-right: 10px;
			  font-size: 14px;
			  font-weight:550
			}
			.wrapper .form .inputfield .ab label{
			  position:relative;
			  width: 30%;
			  padding: 5px 5px;
			  margin-right: 5px;
			  font-size: 14px;
			  font-weight:500
			}
			.wrapper .form .inputfield .input, .wrapper .form .inputfield .textarea{
			  width: 100%;
			  outline: none;
			  border: 1px solid #d5dbd9;
			  font-size: 13px;
			  padding: 6px 10px;
			  border-radius: 3px;
			  transition: all 0.3s ease;
			}

			.wrapper .form .inputfield .textarea{
			  width: 100%;
			  height: 100px;
			  resize: none;
			}

			.wrapper .form .inputfield .custom_select{
			  position: relative;
			  width: 100%;
			  height: 35px;
			}
			.wrapper .form .inputfield .rad{
			  position: relative;
			  width: 100%;
			  height: 30px;
			}

			.wrapper .form .inputfield .custom_select:before{
			  content: "";
			  position: absolute;
			  top: 12px;
			  right: 10px;
			  border: 8px solid;
			  border-color: #d5dbd9 transparent transparent transparent;
			  pointer-events: none;
			}

			.wrapper .form .inputfield .custom_select select{
			  -webkit-appearance: none;
			  -moz-appearance:   none;
			  appearance:        none;
			  outline: none;
			  width: 100%;
			  height: 100%;
			  border: 0px;
			  padding: 8px 10px;
			  font-size: 15px;
			  border: 1px solid #d5dbd9;
			  border-radius: 3px;
			}

			.wrapper .form .inputfield .input:focus, .wrapper .form .inputfield .textarea:focus, .wrapper .form .inputfield .custom_select select:focus{
			  border: 1px solid #fec107;
			}

			.wrapper .form .inputfield .check{
			  width: 15px;
			  height: 14px;
			  position: relative;
			  display: block;
			  cursor: pointer;
			}

			.wrapper .form .inputfield .btn{
			  width: 100%;
			   padding: 8px 10px;
			  font-size: 15px; 
			  border: 0px;
			  background: #0ca5ff/* #fec107*/;
			  color: #fff;
			  cursor: pointer;
			  border-radius: 3px;
			  outline: none;
			}

			.wrapper .form .inputfield .btn:hover{
			  background:/* #ffd658*/#1f78ff;
			}

			.wrapper .form .inputfield:last-child{
			  margin-bottom: 0;
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
			<div class="wrapper">
			<div class="title">New Traffic Case</div>
			<div class="form">
				<form action="addTrafficCase_action.php" method = "post">
					<div class="inputfield">
						<label>Full Name</label>
						<input type="text" class="input" name="name" placeholder="Name" required>
					</div> 
					<div class="inputfield">
					  <label>Vehicle Number</label>
					  <input type="text" class="input" name="vehno" placeholder="Vehicle Number" required>
					</div> 
					<div class="inputfield">
					  <label>Case Number</label>
					  <input type="text" class="input" name="casenu" placeholder="Case Number" required>
					</div> 
					<div class="inputfield">
					  <label>Date</label>
					  <input type="date" class="input" name="date" required>
					</div>  
					<div class="inputfield">
					  <label>Time</label>
					  <input type="time" class="input" name="time" placeholder="">
					</div> 
					<div class="inputfield">
					  <label>Station ID</label>
					  <input type="text" class="input" name="staid" placeholder="Station ID" required>
					</div> 
					<div class="inputfield">
						<label>Type Of Vehicle</label>
						<div class="custom_select">
						<select name="veh">
						  <option value="">Select</option>
						  <option value="Scooter">Scooter</option>
						  <option value="Bike">Bike</option>
						  <option value="Car">Car</option>
						  <option value="Bus">Bus</option>
						  <option value="Truck">Truck</option>
						</select>
						</div>
					</div> 
					<div class="inputfield">
						<label>Type Of Case</label>
						<div class="custom_select">
						<select name="toc">
						  <option value="">Select</option>
						  <option value="Helmet">Helmet</option>
						  <option value="Seatbelt">Seat Belt</option>
						  <option value="Drink and Drive">Drink And Drive</option>
						  <option value="Minor">Minor</option>
						  <option value="Documents">Documents</option>
						</select>
						</div>
					</div> 
					<div class="inputfield">
						<label>Fine</label>
						<div class="ab">
							<input type="radio" id="paid" name="fine" value="paid">
							<label for="Paid">Paid</label>
							<input type="radio" id="notpaid" name="fine" value="notpaid">
							<label for="Notpaid">NotPaid</label>
						</div>
					</div>
					<div class="inputfield">
						<input type="submit" value="Register" class="btn">
					</div>
				</form>
			</div>
		</div>
		</div>
		</div>
	</body>
</html>