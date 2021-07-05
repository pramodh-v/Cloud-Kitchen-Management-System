<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="UndiLogo.png" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row main-content bg-success text-center">
      <div class="col-md-4 text-center company__info">
        <center><img src="UndiLogo.png" width="110" height="100"></center>
      </div>
      <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
        <div class="container-fluid">
          <div class="row">
            <h2>Customer Log In</h2>
          </div>
          <div class="row">
            <form method="post" action="loginquery.php" class="form-group">
  	         <div class="row">
  	           <label>Username</label>
  	           <input type="text" name="username" id="username" class="form__input" placeholder="Username">
  	         </div>
  	          <div class="row">
  	           <label>Password</label>
  	           <input type="password" name="password" id="password" class="form__input" placeholder="Password">
  	         </div>
  	         <div class="row">
  	           <button type="submit" class="btn" name="reg_user">Login</button>
  	         </div>
            </form>
          </div>
  	     <p>Not Registered? <button class="btn" onclick="location.href='register.php'">Sign up</button></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>