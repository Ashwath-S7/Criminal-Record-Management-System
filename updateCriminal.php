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
				margin-top:60px;
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
				padding-top:13px;
				padding-bottom:13px;
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
					$books_query=mysqli_query($conn,"select * from criminal where criminalid='$id'");
					$books_rows=mysqli_fetch_array($books_query);
				?>
				<tr><td>CriminalID:</td><td><?php echo $books_rows['criminalid'];  ?></td></tr>
				<tr><td>StationID:</td><td><?php echo $books_rows['stationid'];  ?></td></tr>
				<tr><td>Criminal Name :</td><td><input type="text" name="criminalname"  class="input" value="<?php echo $books_rows['name'];  ?>"></td></tr>
				<tr><td>Date of Birth :</td><td><input type="date" name="dob" class="input" value="<?php echo $books_rows['dob'];  ?>"></td></tr>
				<tr><td>Height :</td><td><input type="text" name="height" class="input" value="<?php echo $books_rows['height'];  ?>"></td></tr>
				<tr><td>Gender :</td><td><input type="text" name="gender" class="input" value="<?php echo $books_rows['gender'];  ?>"></td></tr>
				<tr><td>Type Of Crime :</td><td><input type="text" name="crimetype"  class="input"value="<?php echo $books_rows['crimetype'];  ?>"></td></tr>
				<tr><td>Address :</td><td><input type="text" name="address"  class="input"value="<?php echo $books_rows['address'];  ?>"></td></tr>
				<tr><td></td><td><input type="submit" name="submit" class="btn"value="Save"></td></tr>
			</table>
		</form>
	</body>
</html>
<?php 
	if (isset($_POST['submit'])){
		$stationid=$_POST['stationid'];
		$criminalname=$_POST['criminalname'];
		$crimetype=$_POST['crimetype'];
		$dob=$_POST['dob'];
		$height=$_POST['height'];
		$address=$_POST['address'];
		$gender=$_POST['gender'];
		mysqli_query($conn,"update criminal set name='$criminalname',crimetype='$crimetype',dob='$dob',height='$height',address='$address',gender='$gender' where criminalid='$id'");
		header('location:adminSearchCriminal.php');
	}
?>
