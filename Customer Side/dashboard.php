<!DOCTYPE HTML>
<html>
<head>
	<title> Place Your Order </title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="UndiLogo.png" rel="icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="dashboardstyle.css">
</head>
<body>
	<?php
		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "cloudkitchenmgmt";

		$db = mysqli_connect($servername,$username,$password,$dbname);
	?>
	<div class="header">
		<div class="topleft">
			<img src="UndiLogo.png" style="height: 100px;width: 100px;"><span class="heading">Cloud Kitchen</span>
			<br>
			<br>
		</div>
		<div class="topright"><button class="btn" onclick="location.href='prev.php'">Your Previous Orders</button>
		<button class="btn" onclick="location.href='index.php'">Logout</button></div>
	</div>
	<div class="username">
		<?php if(isset($_SESSION['username'])):?>
			<center>Hi <strong><?php echo $_SESSION['username'];?>!</strong></center>
		<?php endif ?>
	</div>
	<div class="content">
		<center><p style="color:white;">Choose the items</p>
		<form action="pay.php" method="post" class="f">
		<div id="showitems">
			<?php
				$sql = "SELECT Img,Name,Description,Price FROM item WHERE Available=1";
				$res = mysqli_query($db,$sql);
				if(mysqli_num_rows($res)>0)
				{
					$i=1;
					echo '<table>';
					while($row = mysqli_fetch_assoc($res))
					{
			?>
						<tr><td rowspan="3"><?php echo '<img class="itemimg" src="data:image/jpeg;base64,'.base64_encode( $row['Img'] ).'"/>';?></td>
						<td><?php echo $row['Name']; ?></td>
						<td></td></tr>
						<tr><td><?php echo $row['Description']; ?></td>
						<td>
						<div class="input-group">
						<input type="button" id="sub" value="-" class="sub">
  						<input type="number"  min="0" step="1" max="" value="0" name="quantity[]" class="quantity-field">
  						<input type="button" value="+" class="add">
						</div></td></tr>
						<tr><td><p>&#8377 <?php echo $row['Price']; ?></p></td>
						<td></td>
						</tr>
					<?php
					$i = $i+1;
					}
					echo '</table>';
				}
			?>
		</div>
		<input class="btn" type="submit" name="place" value="Place Order"></input>
		</form>
		</center>
	</div>
	<script src="script.js"></script>
</body>
</html>