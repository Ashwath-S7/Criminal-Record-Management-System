<?php

	session_start();
	
	if(isset($_SESSION["loggedin"])){
		if($_SESSION["loggedin"]==="admin"){
			header("Location:addPoliceStation.php");
		}
		if($_SESSION["loggedin"]==="traffic"){
			header("Location:addTrafficCase.php");
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>New FIR</title>
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
			  overflow-x: hidden;
			  overflow-y: auto;
			  background: #1a1a1a;
			  color: #fff;
			}
			.sidebar-logo {
			  padding: 10px 15px 10px 90px;
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
			 /* position:absolute;
			  margin:20px 20px 20px 280px;
			  opacity:100%;
			  padding:30px;*/
			  padding:40px;
			  padding-left:300px;
			}
			.wrapper{
			  max-width: 850px;
			  width: 100%;
			  background-color: white;
			  opacity: 100%;
			  margin: -5px 60px;
			  z-index: -1;
			  border-radius: 5px;
			  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
			  padding: 10px;
			} 
			.wrapper .title{
			  font-size: 24px;
			  font-weight: 700;
			  margin-top: 5px;
			  margin-bottom: 5px;
			  color: #0ca5ff;
			  text-align: center;
			}

			.wrapper.form {
			    display: inline-block;
				grid-template-columns: auto auto;
				grid-gap: 10px;
				padding: 15px;
				}
			 div.i{
			  display: inline-block;
			  width: 400px;
			  height: 60px;
			  padding: 15px;
			  }
			.wrapper .form .i label{
			   width: 400px;
			   margin-left: 40px;
			   margin-bottom:5px;
			   font-size: 14px;
			   font-weight:600;
			}
			.wrapper .form .i .input, .wrapper .form .i .textarea{
			  width: 90%;
			  outline: none;
			  border: 1px solid #d5dbd9;
			  font-size:12px;
			  padding: 8px 15px;
			  margin-left: 40px;
			  margin-bottom:10px;
			  border-radius: 3px;
			  transition: all 0.3s ease;
			}
			.wrapper .form .i .textarea{
			  width:740px;
			  height: 50px;
			  
			}
			.wrapper .form .i .custom_select{
			  position: relative;
			  margin-left: 40px;
			  width: 90%;
			  height: 35px;
			}
			.wrapper .form .i .custom_select:before{
			  content: "";
			  position: absolute;
			  top: 12px;
			  right: 10px;
			  border: 8px solid;
			  border-color: #d5dbd9 transparent transparent transparent;
			  pointer-events: none;
			}

			.wrapper .form .i .custom_select select{
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

			.wrapper .form .i .input:focus, .wrapper .form .i.textarea:focus, .wrapper .form .i .custom_select select:focus{
			  border: 1px solid #fec107;
			}

			.wrapper .form .inputfield .check{
			  width: 15px;
			  height: 15px;
			  position: relative;
			  display: block;
			  cursor: pointer;
			}

			.wrapper .form .inputfield .btn{
			   width: 100px;
			   height:30px;
			   margin:5px 375px;
			   padding: 6px;
			   font-size: 13px; 
			   border: 0px;
			   background: #0ca5ff;
			   color:  #fff;
			    cursor: pointer;
			   border-radius: 3px;
			   outline: none;
			}

			.wrapper .form .inputfield .btn:hover{
			  background: #1f78ff ;
			}

			.wrapper .form .inputfield:last-child{
			  margin-bottom: 0;
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
					<li class="nav-link-active">
					  <a href="addFIR.php">
						<i class="fa fa-list-alt" aria-hidden="true"></i> Add FIR
					  </a>
					</li>
					<li>
					  <a href="searchCriminal.php">
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
			<div class="wrapper">
			<div class="title">New FIR</div>
			<div class="form">
				<form action="addFIR_action.php" method="post">
					<div class="i">
						<label>FIR number</label>
						<input type="text" class="input" name="fir-no" placeholder="FIR No" required>
					</div> 
					<div class="i">
						<label>Station ID</label>
						<input type="text" class="input" name="sta-id" placeholder="Station ID" required>
					</div>
					<div class="i">
						<label>Victim Name</label>
						<input type="text" class="input" name="vic-name" placeholder="Name Of the Victim" required>
					</div>
					<div class="i">
						<label>Informer Name</label>
						<input type="text" class="input" name="info-name" placeholder="Name of the Informer" required>
					</div>
					<div class="i">
						<label>Place Of Occurence</label>
						<input type="text" class="input" name="placeoo" placeholder="Place Of Incident" required>
					</div> 
					<div class="i">
						<label>Date Of Occurence</label>
						<input type="date" class="input" name="dateoo" required>
					</div>  
					<div class="i">
						<label>Time Of Occurence</label>
						<input type="time" class="input" name="timeoo" >
					</div>
					<div class="i">
						<label>Type Of Crime</label>
						<div class="custom_select">
						<select name="toc" >
						  <option value="">Select</option>
						  <option value="Murder" >Murder</option>
						  <option value="Theft" >Theft</option>
						  <option value="Rape" >Rape</option>
						</select>
						</div>
					</div>
					<div class="i">
						<label>Criminal Name</label>
						<input type="text" class="input" name="crim-name" placeholder="Name of the Criminal">
					</div> 
					</br>
					<div class="i">
						<label>Description of the Incident</label>
						<textarea class="textarea" name="desc" ></textarea>
					</div> 
					<div class="inputfield">
						<input type="submit" value="Submit" class="btn">
					</div>

				</form>
			</div>
		</div>
			</div>
		</div>
	</body>
</html>
