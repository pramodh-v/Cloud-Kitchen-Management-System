<?php 
	include "connect.php";
	$orderid = $_GET['id'];
	$q = "UPDATE delivery SET Delivered=1 WHERE OrderId = '".$orderid."'";
	if(!mysqli_query($db,$q))
	{
		echo mysqli_error($db);
	}
	else
	{
		header("location:DeliveryIndex.php");
	}
?>