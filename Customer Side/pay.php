<!DOCTYPE html>
<html>
<head>
	<title>
		Complete Payment
	</title>
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
	include "connect1.php";
	if(isset($_POST['place']))
	{
		$q = "SELECT * FROM order_details";
		$r = mysqli_query($db,$q);
		$x = mysqli_num_rows($r);
		$orderid = "O".($x+1);
		$_SESSION['orderid'] = $orderid;
		$cusid = $_SESSION['id'];
		$sql = "SELECT Id,Name,Price FROM item where Available=1";
		$res = mysqli_query($db,$sql);
		//$imgarr = [];
		if(mysqli_num_rows($res)>0)
		{
			$i=1;
			$sum=0;
			while($row = mysqli_fetch_assoc($res))
			{
				$prodid = $row['Id'];
				$name = $row['Name'];
				$price = $row['Price'];
				$orderdate = date("Y-m-d");
				if($_POST['quantity'][$i-1]>0)
				{
				$sql="insert into order_products(OrderId,ProdId,Name,Price,Qty) values('".$orderid."',".$prodid.",'".$name."',".$price.",".$_POST['quantity'][$i-1].")";
					//echo $prodid;
					if(mysqli_query($db,$sql))
					{
						//echo "Success";
					}
					else
					{
						echo mysqli_error($db);
					}
					$sum = $sum+($price*$_POST['quantity'][$i-1]);
				}
				$i = $i+1;
			}
		}
		$sql = "insert into order_details(OrderId,UserId,TotPrice,OrderDate) values('".$orderid."',".$cusid.",".$sum.",'".$orderdate."')";
		if(mysqli_query($db,$sql))
		{
			//echo 'Success';
		}
		else
		{
			echo mysqli_error($db);
		}
	}
	//echo $sum;
?>
	<div class="header">
		<center><p style="font-size: 35px;">Complete Payment</center>
	</div>
	<div class="content">
		<center>Order Details</center>
		<div class="showitems">
			<?php
				$sql = "select Name,Price,Qty from order_products where OrderId='$orderid'";
				$res = mysqli_query($db,$sql);
				echo '<center>';
				if(mysqli_num_rows($res)>0)
				{
					echo '<table>';
					while($row = mysqli_fetch_assoc($res))
					{
			?>
						<tr>
						<td>
						Name -
						</td>
						<td>
						<?php echo $row['Name'];	?>
						</td>
						</tr>
						<tr>
						<td>
						Price -
						</td>
						<td>
						<p> &#8377
						<?php echo $row['Price'];?>
						</p>
						</td>
						</tr>
						<tr>
						<td>
						Quantity -
						</td>
						<td>
						<?php echo $row['Qty'];	?>
						</td>
						</tr>
					<?php
					}
					echo '</table>';
					echo '<p style="color: white;"> Total - '.$sum;
					echo '</center>';
				}
			?>
		</div>
		<center>
		<button class="btn" type="submit" name="comp" onclick="location.href='paymentsucc.php'">Complete Payment
		</button>
		</center>
	</div>
</body>
</html>