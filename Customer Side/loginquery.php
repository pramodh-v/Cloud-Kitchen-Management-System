<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	include 'connect1.php';
	session_start();
	$username = "";
	$password1 = "";
	$error = '';
	$flag = false;
	if (isset($_POST['reg_user']))
	{
		$username = $_POST['username'];
		$password1 = md5($_POST['password']);
		//echo $password1;
		$q = "select * from customer_login where username = LOWER('$username') and password='$password1'";
		$result = mysqli_query($db,$q);
		$n = mysqli_num_rows($result);
		$x = 0;
		if($n == $x)
		{
			$error = 'Invalid Username or Password';?>
			<div class="msg">
			<p><?php echo $error ?></p>
			<p>Please Click the button below to enter register page</p>
			<button class="btn" onclick="location.href='register.php'">Go to Register Page</button>
			</div>
		<?php }
		else
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$_SESSION['id'] =  $row['Id'];
				$cusid = $_SESSION['id'];
				$sql = "update referral set Id='".$cusid."' where Id=0";
				$cusid = $_SESSION['id'];
				mysqli_query($db,$sql);
				// echo "\n";
				$_SESSION['username'] =  $row['Username'];
				$_SESSION['password'] =  $row['Password'];
			}
			header("location:dashboard.php");
		}
    }
?>
</body>
</html>