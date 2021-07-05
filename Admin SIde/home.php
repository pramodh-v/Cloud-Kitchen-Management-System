<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="UndiLogo.png" rel="icon">
	<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="homestyle.css">
</head>
<body>
	<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '','cloudkitchenmgmt');
	$def=1; 
	$g=0;
	$r=0;
	?>
	<div class="grid-container">
  <div class="header">
  	<img src="UndiLogo.png" style="width: 100px;height: 100px;"alt="#"><span class="heading">Cloud Kitchen - Admin</span>
  	<div class="topcorner">
  	<button name="cust"onclick="location.href='CustomerDetails.php'" class="topbuttons">Customer Details</button>
  	<button name="del" onclick="location.href='employee.php'" class="topbuttons">Delivery Person Details</button>
  	<button name="upd" onclick="location.href='UpdateStock.php'" class="topbuttons">Update Stock</button>
  	<button name="emp" onclick="location.href='EmpReg.php'" class="topbuttons">Employee Registration</button>
  	</div>
  </div>
  <div class="content">
  	<div class="filter">
  		<center>
  		<form method="post" action="home.php">
  			<select name="order">
  			<option value="" disabled selected>Order ID</option>
  				<?php 
  				$sql = "select distinct(OrderId) from master_table";
  				$res = mysqli_query($db,$sql);
  				while($row = mysqli_fetch_assoc($res))
  				{
  					echo "<option>".$row['OrderId']."</option>";
  				}?>
  			</select>
  			&nbsp;&nbsp;&nbsp;&nbsp;
  			<select name="delivery">
			<option value="" disabled selected>Delivery Person ID</option>
  				<?php 
  				$sql = "select distinct(DelId) from master_table";
  				$res = mysqli_query($db,$sql);
  				while($row = mysqli_fetch_assoc($res))
  				{
  					echo "<option>".$row['DelId']."</option>";
  				}?>
  			</select>
  			&nbsp;&nbsp;&nbsp;&nbsp;
  			<select name="user">
  			<option value="" disabled selected>User ID</option>
  				<?php 
  				$sql = "select distinct(UserId) from master_table";
  				$res = mysqli_query($db,$sql);
  				while($row = mysqli_fetch_assoc($res))
  				{
  					echo "<option>".$row['UserId']."</option>";
  				}?>
  			</select>
  			&nbsp;&nbsp;&nbsp;&nbsp;
  			<select name="orderitem">
  			<option value="" disabled selected>Order Item</option>
  				<?php 
  				$sql = "select distinct(Name) from master_table";
  				$res = mysqli_query($db,$sql);
  				while($row = mysqli_fetch_assoc($res))
  				{
  					echo "<option>".$row['Name']."</option>";
  				}?>
  			</select>
  			&nbsp;&nbsp;&nbsp;&nbsp;
  			<select name="date">
  			<option value="" disabled selected>Order Date</option>
  				<?php 
  				$sql = "select distinct(OrderDate) from master_table";
  				$res = mysqli_query($db,$sql);
  				while($row = mysqli_fetch_assoc($res))
  				{
  					echo "<option>".$row['OrderDate']."</option>";
  				}?>
  			</select>
  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" style="background-color: #54B2B0;" name="filter" value="Submit Filters">
  		</form>
  	</center>
  	</div>
  	<center>
  		<br><br>
  	<?php
  	if(isset($_POST['filter']))
			{
				$def=0;
				$condns = array();
				$where='';
				if(!empty($_POST['order']))
						$condns[] = "OrderId='".$_POST['order']."'";
				if(!empty($_POST['delivery']))
						$condns[] = "DelId='".$_POST['delivery']."'";
				if(!empty($_POST['user']))
						$condns[] = "UserId='".$_POST['user']."'";
				if(!empty($_POST['orderitem']))
						$condns[] = "Name='".$_POST['orderitem']."'";
				if(!empty($_POST['date']))
						$condns[] = "OrderDate='".$_POST['date']."'";
				if (count($condns) > 0) 
    		{ 
        	  $where = ' WHERE '.implode(' AND ',$condns); 
    		} 
    		$sql = "select * from master_table ".$where;
    		$res=mysqli_query($db,$sql);
    		?>
    <table>
  	<th>Order ID</th>
  	<th>Delivery Person ID</th>
  	<th>User ID</th>
  	<th>Item Name</th>
  	<th>Price</th>
  	<th>Quantity</th>
  	<th>Order Date</th>
  	<th>Total Price</th>
    <?php
    while($row = mysqli_fetch_array($res,MYSQLI_NUM))
    {	
    	echo '<tr>';
				echo '<td>'.$row[0].'</td>';
  			echo '<td>'.$row[1].'</td>';
  		echo '<td>'.$row[2].'</td>';
  		echo '<td>'.$row[3].'</td>';
  		echo '<td>'.$row[4].'</td>';
  		echo '<td>'.$row[5].'</td>';
  			echo '<td>'.$row[6].'</td>';
  			echo '<td>'.$row[7].'</td>';
  		echo '</tr>';
  		$r++;
    }
  }
		if($def==1)
  		{?>
  			<table>
  			<th>Order ID</th>
  			<th>Delivery Person ID</th>
  			<th>User ID</th>
  			<th>Item Name</th>
  			<th>Price</th>
  			<th>Quantity</th>
  			<th>Order Date</th>
  			<th>Total Price</th>
  			<br><br><br>
  			<?php
  			$sql = 'select * from master_table';
  			$r = mysqli_query($db,$sql);
  			while($row = mysqli_fetch_array($r,MYSQLI_NUM))
  			{
  				echo '<tr>
  					<td>'.$row[0].'</td>
  					<td>'.$row[1].'</td>
  					<td>'.$row[2].'</td>
  					<td>'.$row[3].'</td>
  					<td>'.$row[4].'</td>
  					<td>'.$row[5].'</td>
  					<td>'.$row[6].'</td>
  					<td>'.$row[7].'</td>
  				</tr>';
  			}
  		}
  		echo '</table>';
  	?>
</center>
  </div>
</div>
</body>
</html>