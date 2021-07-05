<?php
	session_start(); 
	include 'connect.php';
	if(isset($_POST['save'])
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
		$sql = "insert into customer_login values('S1.NEXTVAL','$username','$password1','$email','$phone'";
		if(mysqli_query($db,$sql))
		{
			echo 'Success';
		}
		else
		{
			echo 'Failed!';
		}
	}
?>