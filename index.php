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
	<br/>
	<br/>
	
	<img src="logotcm.png" alt="Girl in a jacket" width="100" height="100" align="right">
	<br><br>
	
	Hello, <?php echo $user_data['user_name']; ?>, welcome to TCM Roadside
	<br><br/>
	
	Pin the Customer's location on the map and click to get nearest resources
	
	<br><br><br>
		<div id="googleMap" style="width:60%;height:400px;"></div>

	<script>
	function myMap() {
	var mapProp= {
    center:new google.maps.LatLng(10.49,-61.25),
    zoom:10,
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

	google.maps.event.addListener(map, 'click', function(event) {	
	alert(event.latLng.lat() + ", " + event.latLng.lng());
	});

	}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKTpI4MWP9jS8_wo34r7yJpBRQ3dM4ycg&callback=myMap"></script>
	<br/>
	Click to get a list of the closest resources to the Roadside <br/><br/>
	<input id="button" type="submit" value="Find Rep">
	<input id="button" type="submit" value="Find Tow">
	<input id="button" type="submit" value="Find Battery">
	<br><br><br>
	Contact a Supervisor for escalations
	<br/>
	Kerron Ali - 475-5000
	<br/>
	Shaakira Sutherland - 760-1738
	

</body>
</html>