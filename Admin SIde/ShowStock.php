<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="stockstyle.css">
</head>
<body>
	<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '','cloudkitchenmgmt');
	if(!empty($_POST['no'])&&!empty($_POST['quantity']))
	{
		$id = $_POST['no'];
		$qty = $_POST['quantity'];
		foreach($id as $key=>$item)
		{
			$sql = "update stocks set Qty=Qty+$qty[$key] where ItemId=$item";
			if(!mysqli_query($db,$sql))
				echo mysqli_error($db);
		}
	}?>
	<table>
<?php	$sql = "select * from stocks";
		$res = mysqli_query($db,$sql);
		while($row = mysqli_fetch_assoc($res))
		{?>
			<th> Item No </th>
			<th> Item Name </th>
			<th> Quantity </th>
			<tr>
			<td><?php echo $row['ItemId'];?></td>
			<td><?php echo $row['ItemName'];?></td>
			<td><?php echo $row['Qty'];?></td>
			</tr>
<?php 	}
?>
	</table>
</body>
</html>