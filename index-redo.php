<!DOCTYPE HTML> 
<html> 
	<head> 
		<title>Log In</title>
		<link href="resources/login-stylesheet.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	</head>
	<body>
    <ul id = "nav">
      <li id = "logo"><a href='#'> OLIO </a></li>
      <li><a href= about.html> About </a></li>
      <li><a href= contact.html> Contact </a></li>
    </ul>
		<div id = "login"> 
			<fieldset>
				<legend>Log In</legend>
				<form action="index.php" method="POST">
          <div id = "pic"><img src="./resources/Logolio.png" alt="Logo"></div>
          <tr> <td>Username:</td> <td> <input type="text" name="user" required></td> </tr> <br>
          <tr> <td>Password:</td> <td> <input type="password" name="pass" required></td> </tr> <br>
          <tr> <td>Confirm Password:</td> <td> <input type="password" name="pass" required></td> </tr> <br>
          <button type = "submit" class = 'btn'><a> Log In! </a></button>
          <tr> <td> <a href="signup.php"> Not a Member? </a> </td> </tr>
        </form> 
			</fieldset>
		</div> 
		<?php 
		function checkuser() {
   		// Check login
     	$dbconn = $GLOBALS['dbconn'];

     	$salt_stmt = $dbconn->prepare('SELECT salt FROM users WHERE username=:username');
     	$salt_stmt->execute(array(':username' => $_POST['username']));
     	$res = $salt_stmt->fetch();
     	$salt = ($res) ? $res['salt'] : '';
     	// $salted = sha1($salt . $_POST['pass']);
     	$salted = hash('sha256', $salt . $_POST['pass']);
  
     
     	$login_stmt = $dbconn->prepare('SELECT username, id FROM users WHERE username=:user AND pass=:pass');
     	$login_stmt->execute(array(':username' => $_POST['user'], ':pass' => $salted));
     
     
     	if ($user = $login_stmt->fetch()) {
       	$_SESSION['username'] = $user['username'];
       	$_SESSION['id'] = $user['id'];


       	// check admin
      	$is_admin = $dbconn->prepare('SELECT 1 FROM users WHERE username=:username AND is_admin= TRUE');
       	$is_admin->execute(array(':username'=> $_SESSION['username']));

       	if ($is_admin->fetch()) {
         $_SESSION['is_admin']=true;
       	} else {
         $_SESSION['is_admin']=false;
       	}

     	} else {
       $_SESSION['err'] = 'Incorrect username or password.';
     	}

		}
		?>
	</body> 
</html>
