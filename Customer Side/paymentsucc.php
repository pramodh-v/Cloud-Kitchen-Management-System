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
	<div class="header">
		<center><p style="font-size: 35px;">Thank you for purchasing with us!</center>
	</div>
	<div class="content">
	<?php
		session_start();
		include "connect1.php";
		$emp= "";
		$sql = "update order_details set paid=1 where OrderId='".$_SESSION['orderid']."'";
		if(!mysqli_query($db,$sql))
		{
			echo mysqli_error($db);
		}
		$q1 = "CALL Allot_Delivery_Person";
		$res1 = mysqli_query($db,$q1);
		while(mysqli_next_result($db)){;}
		if(!$res1)
		{
			echo mysqli_error($db);
		}
		else
		{
			echo "<center>";
			$row = mysqli_fetch_assoc($res1);
			echo '<p class="orderdet"';
			echo "<strong>".$row['Name']." </strong>";
			echo "will be delivering your order</p>";
			echo "</center>";
			$emp = $row['EmpId'];
			$q2 = "select Phno from employee where EmpId = '".$emp."'";
			$res2 = mysqli_query($db,$q2);
			$r1 = mysqli_fetch_assoc($res2);
			echo '<center><p style="color:white;"> Phone No: '.$row['Phno'].'</center>';
		}
		$sql = "insert into delivery(OrderId,DelId,UserId) values('".$_SESSION['orderid']."','".$emp."','".$_SESSION['id']."')";
		while(mysqli_next_result($db)){;}
			if(!mysqli_query($db,$sql))
				echo mysqli_error($db);
	?>
	<center><button class="btn" onclick="location.href='dashboard.php'">Go Back to Dashboard</button></center>
	</div>
</body>
</html>