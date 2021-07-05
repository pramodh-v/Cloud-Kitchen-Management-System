<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="UndiLogo.png" rel="icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="homestyle.css">
</head>
<body>
<?php
session_start();
$db = mysqli_connect('localhost', 'root', '','cloudkitchenmgmt');
$sql= "select * from employee";
$r=mysqli_query($db,$sql);
?>
<div class="grid-container">
  <div class="header">
  	<img src="UndiLogo.png" style="width: 100px;height: 100px;"alt="#"><span class="heading">Delivery Person Details</span>
  </div>
</div>
  <div class="content">
<table>
	<thead>
		<tr>
            <th>empid</th>
			<th>name</th>
			<th>username</th>
			<th>password</th>
			<th>Dob</th>
			<th>address</th>
			<th>phoneno</th>
			<th>salary</th>
			<th>pending</th>
		</tr>
	</thead>
		<?php
			//$i = 0;
			
			while($row = mysqli_fetch_array($r,MYSQLI_NUM))
			{
				
				echo '<tr>
				<td>'. $row[0] .'</td>
				<td>'. $row[1].' </td>
				<td>'. $row[2].' </td>
				<td>'. $row[3].' </td>
				<td>'. $row[4].' </td>
				<td>'. $row[5].' </td>
				<td>'. $row[6].' </td>
				<td>'. $row[7].' </td>
				<td>'. $row[8].' </td>
                </tr>';
				//$i++;
			}
		?>
		</table>
	</div>
</body>
</html>