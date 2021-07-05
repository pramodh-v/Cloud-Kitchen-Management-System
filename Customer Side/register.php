<!DOCTYPE html>
<html>
<head>
	<title>Sign up	 </title>
	<meta charset="UTF-8">
	<link href="UndiLogo.png" rel="icon">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="registerstyle.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<div class="card">
					<form method="post" action="signupquery.php" class="box">
						<center><img src="UndiLogo.png" width="110" height="100"></center>
						<div class="row">
							<label>Name</label>
							<input type="text" name="name" value="" placeholder="Name" required/>
						</div>
						<div class="row">
							<label>Street</label>
							<input type="text" name="address" value="" placeholder="Address." required/>
						</div>
						<div class="row">
							<label>City</label>
							<input type="text" name="city" value="" placeholder="City" required/>
						</div>
						<div class="row">
							<label>Pincode</label>
							<input type="text" name="pin" value="" placeholder="Pincode." required/>
						</div>
						<div class="row">
							<label>Email-ID</label>
							<input type="text" name="mail" value="" placeholder="E-mail." required/>
						</div>
						<div class="row">
							<label>Contact</label>
							<input type="text" name="contact" value="" placeholder="Mobile No." required/>
						</div>
						<div class="row">
							<label>Username</label>
							<input type="text" name="username" value="" placeholder="Username" required/>
						</div>
						<div class="row">
							<label>Password</label>
							<input type="password" name="pwd1" value="" placeholder="Password" required/>
						</div>
						<div class="row">
							<label>Confirm Password</label>
							<input type="password" name="pwd2" value="" placeholder="Confirm password." required/>
						</div>
						<div class="row">
							<input class="btn" type="submit" name="save" value="Save">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<ul class="social-network social-circle">
			<li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
			<li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
        </ul>
	</div>
</body>
</html>