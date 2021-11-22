<?php

	session_start();
	
?>

<?php
	$conn = mysqli_connect('localhost','root','','criminaldb');
	$id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Update Traffic Case</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
			body{
				background-image: url('Images/j.jpeg');
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: cover;
			}
			#card{
				background-color:#212F3D;
				//margin:200px;
				height:200px:
				max-width: 200px;
                width: 50%;
				border-radius:10px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 60px 0 rgba(0,0,0,0.19);
				text-align:center;
				font-size:30px;
				padding:2px;
				padding-top:8px;
				padding-bottom:8px;
				margin-top:30px;
				//margin-left:378px;
				color:#FDFEFE;
				opacity:0.85;
				margin-bottom:0px;
			}
			table,td,th
			{
				margin-left:10px;
				margin-top:15px;
				border:10px #F40E0A;
				align:left;
				font-size:20px;
				text-align:left;
				padding-left:40px;
				padding-right:35px;
				padding-top:11px;
				padding-bottom:11px;
				margin-bottom:0px;
			}
			table{margin:auto;}.input{
			  width: 100%;
			  outline: none;
			  border: 2px solid #d5dbd9;
			  font-size: 15px;
			  font-weight:600;
			  padding: 7px 10px;
			  border-radius: 3px;
			  transition: all 0.3s ease;
			  color:black;
			  background-color:#CCCCFF;
			}
			.btn{
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
			.btn:hover{
			  background:/* #ffd658*/#1f78ff;
			}
		</style>
	</head>
	<body>
		<form method="post">
			<table id='card' border='2'>
				<?php 
					$books_query=mysqli_query($conn,"select * from trafficcase where caseno='$id'or vehicleno='$id'");
					$books_rows=mysqli_fetch_array($books_query);
				?>
				<tr><td>Station ID :</td><td><?php echo $books_rows['stationid'];  ?></td></tr>
				<tr><td>Name of the owner:</td><td><input type="text" name="name" class="input" value="<?php echo $books_rows['name'];  ?>"></td></tr>
				<tr><td>Vehicle Type :</td><td><input type="text" name="vehicletype"  class="input" value="<?php echo $books_rows['vehicletype'];  ?>"></td></tr>
				<tr><td>Vehicle Number :</td><td><input type="text" name="vehicleno" class="input" value="<?php echo $books_rows['vehicleno'];  ?>"></td></tr>
				<tr><td>Date :</td><td><input type="date" name="date" class="input" value="<?php echo $books_rows['date'];  ?>"></td></tr>
				<tr><td>Time :</td><td><input type="time" name="time" class="input" value="<?php echo $books_rows['time'];  ?>"></td></tr>
				<tr><td>Case Type :</td><td><input type="text" name="casetype"  class="input"value="<?php echo $books_rows['casetype'];  ?>"></td></tr>
				<tr><td>Fine :</td><td><input type="text" name="fine"  class="input"value="<?php echo $books_rows['fine'];  ?>"></td></tr>
				<tr><td></td><td><input type="submit" name="submit" class="btn"value="Save"></td></tr>
			</table>
		</form>
	</body>
</html>
<?php 
	if (isset($_POST['submit'])){
		$name=$_POST['name'];
		$vehicletype=$_POST['vehicletype'];
		$vehicleno=$_POST['vehicleno'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$stationid=$_POST['stationid'];
		$casetype=$_POST['casetype'];
		$fine=$_POST['fine'];
		mysqli_query($conn,"update trafficcase set name='$name',vehicletype='$vehicletype',date='$date',time='$time',casetype='$casetype',fine='$fine',vehicleno='$vehicleno' where caseno='$id'");
		header('location:adminSearchTrafficCase.php');
	}
?>
