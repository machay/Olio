<?php
session_start();
require_once 'config.php';
include('connection.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mi=$_POST['mi'];
$dob=$_POST['dob'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$inst=$_POST['inst'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$newuser = "INSERT IGNORE INTO users (fname, lname, mi, dob, email, inst, phone, user, pass) VALUES('$fname', '$lname', '$mi', '$dob', '$email', '$inst', '$phone', '$user', '$pass'";
$conn->exec($newuser);
header("location: signup.php?remarks=success");
mysql_close($conn);
?>
