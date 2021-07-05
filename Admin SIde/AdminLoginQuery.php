<html>
<head>
<title> Admin </title>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="UndiLogo.png" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="adminloginstyle.css">
<?php
	session_start();
	$db = mysqli_connect('localhost','root','','cloudkitchenmgmt');
	$username = "Admin";
	$password1 = "Admin123";
	$flag = false;
	if (isset($_POST['reg_user']))
	{
		$username = $_POST['username'];
		$password1 = $_POST['password'];	
		if($username=="Admin" && $password1=="Admin123")
		{
            $_SESSION['admin']="admin";
            header("location:home.php");
        }
		else
		{
            printf("Invalid Username or Password\n");
		}	
    }
?>
<body>
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<center><img src="UndiLogo.png" width="110" height="100"></center>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Admin Log In</h2>
					</div>
					<div class="row">
						<form control="" action="AdminLoginQuery.php" method="post" class="form-group">
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username">
							</div>
							<div class="row">
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>
							<div class="row">
								<input type="submit" name="reg_user" value="Submit" class="btn">
							</div>
						</form>
					</div>
					<!-- <div class="row">
						<p>Don't have an account? <a href="#">Register Here</a></p>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</body>
</html>

