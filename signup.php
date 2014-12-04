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
								<form action="code_exec.php" method="POST">
								<td>First Name:</td> <td> <input type="text" name="fname" required></td> </tr> 
								<tr> <td>Last Name:</td> <td> <input type"text" name="lname" required></td> </tr>
								<tr> <td>Middle Initial:</td> <td> <input type"text" name="mi" required></td> </tr>
								<tr> <td>Date of Birth (mm/dd/yyyy):</td> <td> <input type"date" name="dob" required></td> </tr>
								<tr> <td>Email:</td> <td> <input type="email" name="email" required></td> </tr> 
								<tr> <td>Institution: </td> <td> <input type="text" name = "inst"></td> </tr>
								<tr> <td>Phone:</td> <td> <input type="tel" name="phone"></td> </tr> 
								<tr> <td>Username:</td> <td> <input type="text" name="user" required></td> </tr> 
								<tr> <td>Password:</td> <td> <input type="password" name="pass" required></td> </tr> 
							</form>
					</table> 
					<button type = "submit" class = 'btn'><a> Sign Up! </a></button>
			</fieldset>
		</div> 
	</body> 
</html>

