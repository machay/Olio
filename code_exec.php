<?php
session_start();
include('connection.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$user=$_POST['user'];
$pass=$_POST['passw'];
$inst=$_POST['inst'];
$email=$_POST['email'];
mysql_query("INSERT INTO member(fname, lname, user, pass, inst, email) VALUES('$fname', '$lname', '$user', '$pass', '$inst', '$email'");
header("location: signup.php?remarks=success");
mysql_close($con);
?>
