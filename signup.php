<!DOCTYPE HTML> 
<html> 
	<head> 
		<link href="resources/signup-stylesheet.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="resources/spectrum.css">
	</head>
	<body>
		<ul id = "nav">
			<li id = "logo"><a href='#'> OLIO </a></li>
			<li><a href= about.html> About </a></li>
			<li><a href= contact.html> Contact </a></li>
			<li><a href= logout.php> Log Out </a></li>
		</ul>
		<div id = "register"> 
			<fieldset>
				<legend>Register</legend> 
					<table>
						<tr> 
							<div id = "pic"><img src="./resources/Logolio.png" alt="Logo"></div>
								<form action="signup.php" method="POST">
									<div id = "info">
										First Name: <input type="text" name="fname" required> <br>
										Last Name: <input type"text" name="lname" required> <br>
										Middle Initial: <input type"text" name="mi" required> <br>
										Date of Birth (mm/dd/yyyy):<input type"date" name="dob" required> <br>
										Email:<input type="email" name="email" required> <br>
										Institution: <input type="text" name = "inst"> <br>
										Phone:<input type="tel" name="phone"> <br>
										Username:<input type="text" name="user" required> <br>
										Password:<input type="password" name="pass" required> <br>
									</div>
									<button type = "submit" class = 'btn'><a> Sign Up! </a></button>
								</form>
					</table> 
			</fieldset>
			<?php
			session_start();
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
			$newuser = "INSERT IGNORE INTO users (fname, lname, mi, dob, email, inst, phone, user, pass)";
			$newuser .= "VALUES('" . $fname . "', '" . $lname. "', '" . $mi . "', '" . $dob . "', '" . $email . "', '" . $inst . "', '" . $phone . "', '" . $user . "', '" . $pass . "'";
			$conn->query($newuser) or die(mysqli_error($conn));
			//$conn->exec($newuser);
			//$usertable = "INSERT TABLE IF NOT EXISTS "
			//Directory manipulation here
			$dir = '.';
			//mkdir()
			header("location: portfolio.html");
			mysql_close($conn);
			?>
		</div> 
	</body> 
</html>
