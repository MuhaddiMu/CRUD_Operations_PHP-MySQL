<?php
$Server = "localhost";
$Username = "root";
$Password = "root";
$DB = "TEMP";
$Connection = mysqli_connect($Server, $Username, $Password, $DB);

if (!$Connection)
	{
	die("Connection Failed: " . mysqli_connect_error());
	}

?>