<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	



?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>TCM Dispatcher Portal</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://www.w3schools.com/lib/w3.js"></script>

<style type="text/css">
	.center {
	margin-left: auto;
	margin-right: auto;
	}
	
</style>

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
	
	<br><br>
	
	<img src="logotcm.png" alt="Girl in a jacket" width="100" height="100" align="right">
	Hello, <?php echo $user_data['user_name']; ?>
	
	<br><br><br>
	<table border = "1" class="center">
		<tr>
			<th>Team Member</th>
			<th>Mobile Contact</th>
		</tr>
		
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "login_sample_db";
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	$sql = "SELECT * FROM team";
	$result = $conn->query($sql);
	
	if($result-> num_rows > 0 ){
		while ($row = $result-> fetch_assoc()) {
			echo "<tr><td>" . $row["team_name"] . "</td><td>" . $row["team_mobile"] . "</td></tr>";
		}
	}
	else{
		echo "No Results";
	}
	$conn->close();
		
	?>
	</table>
	
</body>
</html>
