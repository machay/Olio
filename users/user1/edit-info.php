<?php
session_start();
<<<<<<< Updated upstream
require_once 'config.php';
require 'connection.php';
$fname=mysql_real_escape_string($_POST['yourname']);
$school=mysql_real_escape_string($_POST['institution']);
$bio = mysql_real_escape_string($_POST['bio']);
=======
//require_once 'config.php';
//require 'connection.php';
require 'database.php';
$yourname=mysql_real_escape_string($_POST['fname']);
$lname=mysql_real_escape_string($_POST['lname']);
$inst=mysql_real_escape_string($_POST['inst']);
>>>>>>> Stashed changes
$email=mysql_real_escape_string($_POST['email']);
$updateuser = "UPDATE users (fname, email, school, bio)
			SET fname ='$fname', school='$school', 'bio'='$bio', 'email'='$email'
			WHERE id=1";
$mysqli->query($updateuser) or die(mysqli_error($conn));
			//$conn->exec($newuser);
			//$usertable = "INSERT TABLE IF NOT EXISTS "
			//Directory manipulation here
			$dir = '.';
			//mkdir()
			header("location: index-redo.php");
			mysql_close($conn);
			?>
