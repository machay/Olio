<?php
session_start();
require_once 'config.php';
require 'connection.php';
$yourname=mysql_real_escape_string($_POST['fname']);
$lname=mysql_real_escape_string($_POST['lname']);
$inst=mysql_real_escape_string($_POST['inst']);
$email=mysql_real_escape_string($_POST['email']);
$newuser = "INSERT INTO users (fname, lname, mi, dob, email, school, phone, username, password)
			VALUES('$fname','$lname', '$mi', '$dob', '$email', '$inst', '$phone', '$user', '$pass')";
$mysqli->query($newuser) or die(mysqli_error($conn));
			//$conn->exec($newuser);
			//$usertable = "INSERT TABLE IF NOT EXISTS "
			//Directory manipulation here
			$dir = '.';
			//mkdir()
			header("location: index.php");
			mysql_close($conn);
			?>
