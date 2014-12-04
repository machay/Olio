			<?php
			session_start();
			require_once 'config.php';
			require 'connection.php';
			$fname=mysql_real_escape_string($_POST['fname']);
			$lname=mysql_real_escape_string($_POST['lname']);
			$mi=mysql_real_escape_string($_POST['mi']);
			$dob=mysql_real_escape_string($_POST['dob']);
			$user=mysql_real_escape_string($_POST['user']);
			$pass=mysql_real_escape_string($_POST['pass']);
			$inst=mysql_real_escape_string($_POST['inst']);
			$email=mysql_real_escape_string($_POST['email']);
			$phone=mysql_real_escape_string($_POST['phone']);
			$newuser = "INSERT INTO users (fname, lname, mi, dob, email, school, phone, username, password)
			VALUES('$fname','$lname', '$mi', '$dob', '$email', '$inst', '$phone', '$user', '$pass')";
			$mysqli->query($newuser) or die(mysqli_error($conn));
			//$conn->exec($newuser);
			//$usertable = "INSERT TABLE IF NOT EXISTS "
			//Directory manipulation here
			$dir = '.';
			//mkdir()
			header("location: portfolio.html");
			mysql_close($conn);
			?>
