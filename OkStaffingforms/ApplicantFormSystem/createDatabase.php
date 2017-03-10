<?php

//Make connection to database
$conn = mysqli_connect("localhost", "OkStaff","staffing" ,'okstaffing');


// Check connection
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE okstaff";
if ($conn->query($sql) === TRUE)
{
	echo "Database created successfully";
}
else
{
	echo "Error creating database: " . $conn->error;
}

//Database main code to create all required database objects
header("location:DBMainCode.php");

?>
