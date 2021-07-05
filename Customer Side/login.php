<?php

session_start();

	include("connect1.php");
	//include("functions.php");


	if(isset($_POST['submit_button']))
	{
		//something was posted
		$user_NABH = $_POST['user_id'];
		$password = $_POST['password'];
		echo $user_NABH;
		echo $password;

		if(!empty($user_NABH) && !empty($password) && is_numeric($user_NABH))
		{

			//read from database
			echo $user_NABH;
			echo $password;
			$query = "SELECT * FROM hospital_info where NABH = '$user_NABH' and password = '$password' limit 1";
			$result = mysqli_query($db, $query);
//			$rows= mysqli_num_rows($result);
//				echo $rows;
				if($result && mysqli_num_rows($result) > 0)
				{
					echo "hello guys";
					$user_data = mysqli_fetch_assoc($result);
//					if($password === $user_data['password'])
//					{

//						$_SESSION['NABH'] = $user_data['NABH'];
						header("Location: index.php");
						die;
//					}
//					else {
//							echo "wrong username or password!";
//					}
				}

				else
				{
					echo mysqli_error($db);
					echo "Invalid username or password!";
				}
	}
	else {
		echo "empty tags";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

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
		width: 100px;
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

		<form method="POST" action="login.php">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			Enter NABH:<input id="text" type="text" name="user_id"><br><br>
			Enter password:<input id="text" type="password" name="password"><br><br>

			<input id="button" name="submit_button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>
