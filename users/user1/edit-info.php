<?php
//session_start();
//require_once 'config.php';
//require 'connection.php';
require 'database.php';
$username = $_SESSION['username'];
$inst=mysql_real_escape_string($_POST['institution']);
$email=mysql_real_escape_string($_POST['email']);
$bio=mysql_real_escape_string($_POST['bio']);
$updateuser = "UPDATE users
			SET school='$inst', bio='$bio', email='$email'
			WHERE username = '$username'";
$mysqli->query($updateuser) or die(mysqli_error($mysqli));
			//$conn->exec($newuser);
			//$usertable = "INSERT TABLE IF NOT EXISTS "
			//Directory manipulation here
			$dir = '.';
			//mkdir()
			header("location: index-redo.php");
			mysql_close($conn);
			?>
