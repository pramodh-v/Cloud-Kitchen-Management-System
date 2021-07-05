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
		<center>Your Previous Orders</center>
	</div>
	<div class="content">
	<center>
<?php
	session_start();
	include "connect1.php";
	$sql = "select od.OrderId,op.Name,op.Price,op.Qty,od.OrderDate,od.TotPrice from order_products op inner join order_details od on op.OrderId = od.OrderId where od.UserId ='".$_SESSION['id']."' ";
	$res = mysqli_query($db,$sql);
	$table = "<table><tr><th>Name</th><th>Price</th><th>Quantity</th><th>Date</th><th></th><th>Total Price</th></tr>";
	$g=0;
	$r=0;
	while ($row = mysqli_fetch_assoc($res))
	{
		if($g==$r)
		{
			$r=0;
			$q1 = "select * from order_products where OrderId = '".$row['OrderId']."'";
			$r1 = mysqli_query($db,$q1);
			$g  = mysqli_num_rows($r1);
			// echo $r;
		}
    	$table .= "<tr>";
    	$table .= "<td>{$row['Name']}</td>";
    	$table .= "<td>{$row['Price']}</td>";
    	$table .= "<td>{$row['Qty']}</td>";
    	if($r==0)
    	{
    		$table.='<td rowspan"'.$g.'">'.$row['OrderDate'].'<td>';
    		$table.='<td rowspan"'.$g.'">'.$row['TotPrice'].'<td>';
    	}
    	$table .= "</tr>";
    	$r++;
    	// if($g==$r)
    	// {
    	// 	echo "<br>";
    	// }
	}
	$table .= "</table>";
	print $table;
?>
</center>
</div>
</body>
</html>