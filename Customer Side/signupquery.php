<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	session_start(); 
	include 'connect1.php';
	if(isset($_POST['save']))
	{
		$name = $_POST['name'];
		$username = $_POST['username'];
		$phone = $_POST['contact'];
		$password1 = $_POST['pwd1'];
		$password2 = $_POST['pwd2'];
		$email = $_POST['mail'];
		$street = $_POST['address'];
		$city = $_POST['city'];
		$pincode = $_POST['pin'];
		$error = '';
		if($password1===$password2)
		{
			$pw = $password1;
			$sql = "insert into customer_login(Username,Password,Email,Phone) values(LOWER('$username'),md5('$pw'),'$email',$phone)";
			if(!mysqli_query($db,$sql))
			{
				echo "Here";
				echo mysqli_error($db);
				$error = "Unacceptable Credentials";
			}
			$sql = "insert into customer_details(Name,Add1,City,Pin,Email,Phone) values('$name','$street','$city',$pincode,'$email',$phone)";
			if(!mysqli_query($db,$sql))
			{
				echo mysqli_error($db);
				$error = "Account Already Exists";
			}
		}
		else
		{
			$error = "Passwords Mismatch";
		}
	}
	if(!$error)
	{
		header("location:index.php");
	}
?>
<div class="msg">
	<p><?php echo $error ?></p>
	<p>Please Click the button below to enter register page</p>
	<button class="btn" onclick="location.href='register.php'">Go to Register Page</button>
</div>
</body>