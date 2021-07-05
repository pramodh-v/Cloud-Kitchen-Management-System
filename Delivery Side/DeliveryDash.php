<html>
<head>
<title> Collect and Deliver your Orders </title>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="UndiLogo.png" rel="icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<?php

	session_start();
	include "connect.php";
	
	$username = "";
	$password1 = "";
	$error = "";
	$flag = false;
	
	if (isset($_POST['reg_user']))
	{
		$username = $_POST['username'];
		$password1 = $_POST['password'];
	
		$q = "select * from employee where username = '$username' and password='$password1'";
		$result = mysqli_query($db,$q);
		$n = mysqli_num_rows($result);
		$x = 0;
		if($n == $x)
		{
			$error = "Invalid Username Or Password";
		}
		else
		{
			while($row = mysqli_fetch_assoc($result))
			{	
				$_SESSION['Id'] = $row['EmpId'];
				echo '<div class="header">';
				echo "<center>Welcome <strong>".$row['Name']."</strong></center>";?>
				<div style="top:15px;right:0;" class="topright"><center><button class="btn" onclick="location.href='DeliveryIndex.php'">LogOut</button></center></div>
				<?php echo "</div>";
			}
		}
		if($error)
		{?>
		<div class="msg">
		<p><?php echo $error ?></p>
		<p>Please Click the button below to enter Login page</p>
		<button class="btn" onclick="location.href='DeliveryDash.php'">Go to Login Page</button>
		</div>
		<?php }
		else
	{?>
		<div class="content">
		<center>
	<?php echo "<p>Pending Orders</p>";
		//echo "<br><br>";
		//echo $_SESSION['Id'];
		$q = "select * from delivery where DelId ='".$_SESSION['Id']."' and Delivered=0";
		$res = mysqli_query($db,$q);
		if(!$res)
			echo mysqli_error($db);
		$i=1;
		if(mysqli_num_rows($res)==0)
			echo '<p><strong style="color:white;"> <center>No Orders to Be Delivered!</center></strong></p>';
		else
		{
			echo '<center>';
				echo '<table>';
				echo '<tr>';
				echo '<th>Order Number</th>';
				echo '<th>Customer Name</th>';
				echo '<th>Deliver To</th>';
				echo '<th>Contact of Customer</th>';
				echo '<th>Update Status</th>';
				echo '</tr>';
			while($row = mysqli_fetch_assoc($res))
			{
				$q1 = "select Name,Add1,Phone from customer_details where Id=".$row['UserId']."";
				//echo $row['UserId'];
				$res1 = mysqli_query($db,$q1);
				if(!$res1)
				{
					echo mysqli_error($db);
					echo "Error Here";
				}
				while($r1 = mysqli_fetch_assoc($res1))
				{
					//echo $r1['Name'];
	?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $r1['Name']; ?></td>
					<td><?php echo $r1['Add1']; ?></td>
					<td><?php echo $r1['Phone'] ?></td>
					<td><a href="Delivered.php?id=<?php echo $row['OrderId']; ?>">Delivered?</a></td>
					</tr> 
				<?php
				}
				$i++; 
			}
			echo '</table>';
		}
	}
}
				?> 
</body>
</html>