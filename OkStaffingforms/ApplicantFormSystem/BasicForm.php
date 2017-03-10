<?php
session_start();

//Storing user input into session variables
$_SESSION['jName'] =  $_POST['jobname'];
$_SESSION['jNumber'] = $_POST['jobnumber'];
$_SESSION['fName'] = $_POST['fname'];
$_SESSION['lName'] = $_POST['lname'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['province'] = $_POST['province'];

//go to the next section 
header("location:eduEmpStat.html");
?>


