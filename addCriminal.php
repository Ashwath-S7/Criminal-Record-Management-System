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
		<title>New Criminal</title>
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
			  padding: 10px 10px 10px 500px;
			}
			.wrapper{
			  max-width: 500px;
			  width: 100%;
			  background-color: white;
			  /*opacity: 90%;*/
			  margin: 10px;
			  z-index: -1;
			  border-radius: 5px;
			  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
			  padding: 30px;
			}

			.wrapper .title{
			  font-size: 24px;
			  font-weight: 700;
			  margin-top: -10px;
			  margin-bottom: 10px;
			  color: #0ca5ff;
			  text-align: center;
			}

			.wrapper .form{
			  width: 100%;
			}

			.wrapper .form .inputfield{
			  margin-bottom: 7px;
			  display: flex;
			  align-items: center;
			}

			.wrapper .form .inputfield label{
			   width: 200px;
			   /*color: #757575;*/
			   margin-right: 10px;
			   font-size: 13px;
			   font-weight:500;
			}
			
			.wrapper .form .inputfield .ab label{
			  width: 20%;
			  height:20px;
			  padding: 5px 4px;
			  margin-right: 10px;
			  font-size: 14px;
			  font-weight:500
			}
			.image-preview__image{
				display:none;
				width:100%;
			}
			.wrapper .form .inputfield .input, .wrapper .form .inputfield .textarea{
			  width: 100%;
			  outline: none;
			  border: 1px solid #d5dbd9;
			  font-size: 13px;
			  padding: 5px 10px;
			  border-radius: 3px;
			  transition: all 0.3s ease;
			}
			.wrapper .form .inputfield .textarea{
			  width: 100%;
			  height: 60px;
			  resize: none;
			}
			.wrapper .form .inputfield .custom_select{
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
			  padding: 3px 10px;
			  font-size: 15px;
			  border: 1px solid #d5dbd9;
			  border-radius: 3px;
			}

			.wrapper .form .inputfield .input:focus, .wrapper .form .inputfield .textarea:focus, .wrapper .form .inputfield .custom_select select:focus{
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

			.wrapper .form .inputfield .img{
				margin-right:150px;
				margin-top:50px;
			}

			.wrapper .form .image-preview{
				width:130px;
				min-height:130px;
				border:1px solid #d5dbd9;
				margin:-80px 0px 10px 300px;
				display:flex;
				align-items:center;
				justify-content:center;
				font-weight:bold;
				color:#cccccc;
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
					<li class="nav-link-active">
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
			<div class="title">New Criminal</div>
			<div class="form">
				<form action="addCriminal_action.php" method="post" enctype="multipart/form-data">
					<div class="inputfield">
						<label>Full Name</label>
						<input type="text" class="input" name="cname" placeholder="Name" required>
					</div> 
					<div class="inputfield">
						<label style="margin-top:50px;">Photo</label>
						<input type="file" class="img" name="inpFile" id="inpFile">
					</div> 
					<div class="image-preview" id="imagePreview">
						<img src="" alt="Image Preview" class="image-preview__image">
						<span class="image-preview__default-text">Image Preview</span>
					</div>
					<div class="inputfield">
					  <label>Criminal ID</label>
					  <input type="text" class="input" name="cid" placeholder="Criminal ID" required>
					</div>
					<div class="inputfield">
					  <label>Station ID</label>
					  <input type="text" class="input" name="sid" placeholder="Station ID" required>
					</div>
					<div class="inputfield">
					  <label>Date of Birth</label>
					  <input type="date" class="input" name="cdob" required>
					</div>  
					<div class="inputfield">
					  <label>Height</label>
					  <input type="text" class="input" name="cheight" placeholder="0.0ft" required>
					</div> 
					<div class="inputfield">
						<label>Gender</label>
						<div class="ab">
							<input type="radio" id="male" name="cgender" value="male" required>
							<label for="Male">Male</label>
							<input type="radio" id="female" name="cgender" value="female">
							<label for="Female">Female</label>
							<input type="radio" id="other" name="cgender" value="other">
							<label for="Other">Other</label>
						</div>
					</div>
					<div class="inputfield">
						<label>Type Of Crime</label>
						<div class="custom_select">
						<select name="ctoc">
						  <option value="Murder" >Murder</option>
						  <option value="Theft" >Theft</option>
						  <option value="Rape" >Rape</option>
						</select>
						</div>
					</div> 
					<div class="inputfield">
					  <label>Address</label>
					  <textarea class="textarea" name="caddress"></textarea>
					</div> 
					<div class="inputfield">
						<input type="submit" value="Register" class="btn">
					</div>
				</form>
			</div>
		</div>
			</div>
		</div>
		<script>
			const inpFile = document.getElementById("inpFile");
			const previewContainer = document.getElementById("imagePreview");
			const previewImage = previewContainer.querySelector(".image-preview__image");
			const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
			
			inpFile.addEventListener("change",function(){
				const file = this.files[0];
				
				if(file){
					const reader = new FileReader();
					
					previewDefaultText.style.display = "none";
					previewImage.style.display = "block";
					
					reader.addEventListener("load",function(){
						previewImage.setAttribute("src",this.result);
					});
					
					reader.readAsDataURL(file);
				}else{
					previewDefaultText.style.display = null;
					previewImage.style.display = null;
					previewImage.setAttribute("src","");
				}
			});
		</script>
	</body>
</html>