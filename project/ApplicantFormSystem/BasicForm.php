<?php
session_start();

//All user input into session variables
$_SESSION['jName'] =  $_POST['jobname']; 
$_SESSION['jNumber'] = $_POST['jobnumber'];
$_SESSION['fName'] = $_POST['fname'];
$_SESSION['lName'] = $_POST['lname'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['cellphone'] = $_POST['cellphone'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['province'] = $_POST['province'];
$_SESSION['postal'] = $_POST['postal'];
$_SESSION['contactMethod'] = $_POST['optradio'];
$_SESSION['howHear'] = $_POST['howHear'];

//Next section of the Form
header("location:eduEmpStat.html");
?>


