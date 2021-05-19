<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$team_name = $_POST['team_name'];
		$team_mobile = $_POST['team_mobile'];

		if(!empty($team_name) && !empty($team_mobile) && !is_numeric($team_name))
		{

			//save to database
			$id = random_num(6);
			$query = "insert into team (id,team_name,team_mobile) values ('$id','$team_name','$team_mobile')";

			mysqli_query($con, $query);
			
			header("Location: admin.php");

			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>TCM Dispatcher Portal</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://www.w3schools.com/lib/w3.js"></script>

<body>
	<div class="w3-top w3-bar w3-black">
	<a href="index.php" class="w3-bar-item w3-button">Home</a>
	<a href="team.php" class="w3-bar-item w3-button">Team</a>
	<a href="vehicles.php" class="w3-bar-item w3-button">Vehicles</a>
	<a href="assign.php" class="w3-bar-item w3-button">Assign</a>
	<a href="admin.php" class="w3-bar-item w3-button">Admin</a>
		
	<div class="w3-right w3-hide-small">
	<a href="logout.php" class="w3-bar-item w3-button">Logout</a>
	</div>
	</div>
	
	<br><br><br>
	
	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 150px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Add Team Member</div>
			Full Name <br/>
			<input id="text" type="text" name="team_name"><br><br>
			Mobile Number <br/>
			<input id="text" type="text" name="team_mobile"><br><br>

			<input id="button" type="submit" value="Add Member"><br><br>

			
		</form>
	</div>
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Add Vehicle</div>
			License Plate <br/>
			<input id="text" type="text" name="license"><br><br>
			Make/Model <br/>
			<input id="text" type="text" name="make/model"><br><br>
			Color <br/>
			<input id="text" type="text" name="color"><br><br>
			Type <br/>
			<input id="text" type="text" name="type"><br><br>

			<input id="button" type="submit" value="Add Team"><br><br>

			
		</form>
	</div>
</body>
</html>