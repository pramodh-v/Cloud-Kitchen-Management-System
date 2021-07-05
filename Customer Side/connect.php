<?php
	$servername = "localhost";
	try
	{
		$db = 	new PDO("mysql:host=$servername;dbname=cloudkitchenmgmt","root","");
		//echo "Connected successfully";
	}
	catch(PDOException $e) 
	{
  		echo "Connection failed: " . $e->getMessage();
	}
?>