<!DOCTYPE html>
<html>
  <head>
    <title>Login</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <script type="text/javascript" src="resources/jquery-1.4.3.min.js"></script>   
    <!-- <link href="index.css" rel="stylesheet" type="text/css"/> -->
  </head>
  <body>
    <div id="bodyBlock">
    <h1>User Login</h1>
            
<?php 
  /* some very basic form processing */
  
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
        require 'connect.php';
        $GLOBALS['DB_USERNAME'] = $username;
        $GLOBALS['DB_PASSWORD'] = $password;
        $conn = DBconnect($GLOBALS['DB_HOST'], $GLOBALS['DB_NAME'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD']);
        if ($conn) {
          ?> <script>window.location.href = 'portfolio.html'</script> <?php
        } 
        ?>
      </div>
    <?php } 
  }
?>

<form id="addForm" name="addForm" action="index.php" method="post">
  <fieldset> 
    <div class="formData">
                    

	<label class="field" for="username">Username:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $username; ?>" name="username" id="username"/></div>

	<label class="field" for="password">Password:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $password; ?>" name="password" id="password"/></div>

    <input type="submit" value="Login" id="save" name="save"/>
    </div>
  </fieldset>
</form>

    </div>
  </body>
</html>
