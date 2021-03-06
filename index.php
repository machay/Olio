<?php
session_start();

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  header('location: users/'.$username);
}

?>

<!DOCTYPE html>

<html> 
  <head> 
    <title>Log In</title>
    <link href="resources/login-stylesheet.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="resources/spectrum.css">
  </head>
  <?php 
      //session_start();
      // variables to hold our form values:
      $username = '';
      $password = '';
      // hold any error messages
      $errors = ''; 
      
      // have we posted?
      $havePost = isset($_POST["save"]);
      
      if ($havePost) {
        // Get the input and clean it.
        // First, let's get the input one param at a time
      $username = htmlspecialchars(trim($_POST["username"]));
      $password = htmlspecialchars(trim($_POST["password"]));
        
        // Let's do some basic validation
        $focusId = ''; // trap the first field that needs updating, better would be to save errors in an array
        if ($username == '') {
            $errors .= '<li>Username may not be blank</li>';
            if ($focusId == '') $focusId = '#username';
        }
      if ($password == '') {
            $errors .= '<li>Password may not be blank</li>';
            if ($focusId == '') $focusId = '#password';
        }
      if ($errors != '') { ?>
          <div id="messages">
            <h4>Please correct the following errors:</h4>
            <ul>
              <?php echo $errors; ?>
            </ul>
            <script type="text/javascript">
              $(document).ready(function() {
                $("<?php echo $focusId ?>").focus();
              });
            </script>
          </div>
        <?php } else { ?> 
          <div id="loginattempt">
            <?php
            require_once 'config.php';   
            require 'connection.php';
            $login = $connpdo->prepare('SELECT username FROM users WHERE username=:username AND password=:pass');
            $login->execute(array(':username' => $username, ':pass' => $password));
            if ($user = $login->fetch()) {
              $_SESSION['username'] = $username;
              header('location: users/'.$username);
            }
            else {
              $err = "Incorrect username or password";
            }
            ?>
          </div>
        <?php } 
      }
    ?>
  <body>
    <ul id = "nav">
      <li id = "logo"><a href='#'> OLIO </a></li>
      <li><a href= about.html> About </a></li>
      <li><a href= contact.html> Contact </a></li>
      <li><a href= logout.php> Log Out </a></li>
    </ul>
    <div id = "login"> 
      <fieldset>
        <legend>Log In</legend>
        <form action="index.php" method="POST">
          <div id = "pic"><img src="./resources/Logolio.png" alt="Logo"></div>
          <tr> <td>Username:</td> <td> <input type="text" size="60" value="<?php echo $username; ?>" name="username" id="username"/></td> </tr> <br>
          <br><tr> <td>Password:</td> <td> <input type="password" size="60" value="<?php echo $password; ?>" name="password" id="password"/></td> </tr> <br>
          <button type = "submit" class = 'btn' id='save' name='save'><a> Log In! </a></button>
          <?php if (isset($err)) echo"<p>$err</p>" ?>
          <br><tr> <td> <a id = "memberlink" href="signup.html"> Not a Member? </a> </td> </tr>
        </form> 
      </fieldset>
    </div> 
          
    </div>

  </body>
</html>
