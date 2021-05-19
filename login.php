<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>TCM Dispatcher Portal</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="style.css">

<body>

<div class="login">
  <h1><img src="logotcm.png" alt="TCM Roadside" width="165" height="150"><h1>
    <form method="post">
      <input id="text" type="text" name="user_name" placeholder="Username" required="required" />
      <input id="text" type="password" name="password" placeholder="Password" required="required" />
      <button type="submit" value="Login" class="btn btn-primary btn-block btn-large">TCM Roadside Dashboard</button>
    </form>
</div>

</body>