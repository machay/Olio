<?php
	require_once 'config.php';
	require 'connection.php';
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
	//header("location: users/user1/index.php");
	$conn->exec($newuser);
	//$usertable = "INSERT TABLE IF NOT EXISTS "
	//Directory manipulation here
	//$dir = '.';
	//mkdir()
	mysql_close($conn);
?>
