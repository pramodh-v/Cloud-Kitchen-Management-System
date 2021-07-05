<!DOCTYPE html>
<html>
<head>
	<title>Sign up	 </title>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>
<?php 
	session_start(); 
	include 'connect1.php';
	if(isset($_POST['save']))
	{
		$name = $_POST['name'];
		$add = $_POST['address'];
		$city = $_POST['city'];;
		$username = $_POST['username'];
		$phone = $_POST['contact'];
		$dob = $_POST['dob'];
		$password1 = $_POST['pwd1'];
		$password2 = $_POST['pwd2'];
		$email = $_POST['mail'];
		$street = $_POST['address'];
		$city = $_POST['city'];
		$error = '';
		if($password1===$password2)
		{
			$pw = $password1;
			$q1 = "select * from employee";
			$r1 = mysqli_query($db,$q1);
			$n = mysqli_num_rows($r1);
			$empid = 'D'.($n+1);
			$sql = "insert into employee(EmpId,Name,Username,Password,Dob,Address,Phno,Salary) values('$empid','$name',LOWER('$username'),'$pw',$dob,'$add',$phone,6000)";
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
		header("location:home.php");
	}
?>
<div class="msg">
	<p><?php echo $error ?></p>
	<p>Please Click the button below to enter register page</p>
	<button class="btn" onclick="location.href='EmpReg.php'">Go to Register Page</button>
</div>
</body>
</html>