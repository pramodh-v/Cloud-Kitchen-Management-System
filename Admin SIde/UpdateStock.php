<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="UndiLogo.png" rel="icon">
	<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="homestyle.css">
	<script>
	function addRow(id)
	{
	var tab = document.getElementById(id);
	var rowCount = tab.rows.length;
	var row = tab.insertRow(rowCount);
	var col = tab.rows[1].cells.length;
	for(var i=0;i<col;i++)
	{
		var newCell = row.insertCell(i);
		newCell.innerHTML = tab.rows[1].cells[i].innerHTML;
	}
	}
	</script>
</head>
<body>
	<?php $def=1; ?>
	<div class="grid-container">
  <div class="header">
  	<img src="UndiLogo.png" style="width: 100px;height: 100px;"alt="#"><span class="heading">Update Stock</span>
  </div>
</div>
  <div class="content">
  	<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '','cloudkitchenmgmt');
	if(isset($_POST['upd']))
	{
		$def=0;
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
		}
		echo '<table>';
		echo '<th> Item No </th>
			<th> Item Name </th>
			<th> Quantity </th>
			<tr>';
		$sql = "select * from stocks";
		$res = mysqli_query($db,$sql);
		while($row = mysqli_fetch_assoc($res))
		{
			echo '<td>'.$row['ItemId'].'</td>';
			echo '<td>'.$row['ItemName'].'</td>';
			echo '<td>'.$row['Qty'].'</td>';
			echo '<tr>';
		}
		echo '</table>';
	}
	if($def==1)
	{?>
	<form method="post" action="UpdateStock.php">
	<center>
		<table id="tb">
			<center><th> Item No </th></center>
			<center><th> Change Quantity </th></center>
			<tr>
			<td><input type="number" name="no[]" min="0"></td>
			<td><input type="number" name="quantity[]" min="0"></td>
			</tr>
		</table>
	<input type="button" value="Add item" onClick="addRow('tb')"/>
	<input type="submit" name="upd" value="Update Stock"/>
	</center>
	</form>
	<?php
	}
	?>
</body>
</html>