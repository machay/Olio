<!DOCTYPE html>
<html>
  <head>
    <title>Create User</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <!-- <script type="text/javascript" src="resources/jquery-1.4.3.min.js"></script>   
    <link href="Login.css" rel="stylesheet" type="text/css"/> -->
  </head>
  <body>
    <div id="bodyBlock">

      <h1>User Creation v1</h1>
            
<?php 
  /* some very basic form processing */
  
  // variables to hold our form values:
  $firstName = '';  
  $lastName = '';
  $mInitial = '';
  $dob = '';
  $email = '';
  $emailConfirm = '';
  $school = '';
  $username = '';
  $password = '';
  $passwordConfirm = '';
  // hold any error messages
  $errors = ''; 
  
  // have we posted?
  $havePost = isset($_POST["save"]);
  
  if ($havePost) {
    // Get the input and clean it.
    // First, let's get the input one param at a time.
    $firstName = htmlspecialchars(trim($_POST["firstName"]));
	$lastName = htmlspecialchars(trim($_POST["lastName"]));
	$mInitial = htmlspecialchars(trim($_POST["mInitial"]));
	$dob = htmlspecialchars(trim($_POST["dob"]));
	$email = htmlspecialchars(trim($_POST["email"]));
	$emailConfirm = htmlspecialchars(trim($_POST["emailConfirm"]));
	$school = htmlspecialchars(trim($_POST["school"]));
	$username = htmlspecialchars(trim($_POST["username"]));
	$password = htmlspecialchars(trim($_POST["password"]));
	$passwordConfirm = htmlspecialchars(trim($_POST["passwordConfirm"]));
    
    // special handling for the date of birth
    $dobTime = strtotime($dob); // parse the date of birth into a Unix timestamp (seconds since Jan 1, 1970)
    $dateFormat = 'Y-m-d'; // the date format we expect, yyyy-mm-dd
    $dobOk = (date($dateFormat, $dobTime) == $dob);  
    
    // Let's do some basic validation
    $focusId = ''; // trap the first field that needs updating, better would be to save errors in an array
    
    if ($firstName == '') {
            $errors .= '<li>First name may not be blank</li>';
            if ($focusId == '') $focusId = '#firstName';
    }
	if ($lastName == '') {
            $errors .= '<li>Last name may not be blank</li>';
            if ($focusId == '') $focusId = '#lastName';
    }
	if ($mInitial == '') {
            $errors .= '<li>Middle initial may not be blank</li>';
            if ($focusId == '') $focusId = '#mInitial';
    }
	if ($dob == '') {
        $errors .= '<li>Date of birth may not be blank</li>';
        if ($focusId == '') $focusId = '#dob';
    }
	if ($email == '') {
        $errors .= '<li>E-mail may not be blank</li>';
        if ($focusId == '') $focusId = '#email';
    }
	if ($emailConfirm == '') {
        $errors .= '<li>E-mail confirmation may not be blank</li>';
        if ($focusId == '') $focusId = '#emailConfirm';
    }
    if ($email != $emailConfirm) {
    	$errors .= '<li>E-mail must match e-mail confirmation</li>';
    	if ($focusId == '') $focusId = '#emailConfirm';
    }
    if ($username == '') {
        $errors .= '<li>Username may not be blank</li>';
        if ($focusId == '') $focusId = '#username';
    }
	if ($password == '') {
        $errors .= '<li>Password may not be blank</li>';
        if ($focusId == '') $focusId = '#password';
    }
	if ($passwordConfirm == '') {
                $errors .= '<li>Password confirmation may not be blank</li>';
                if ($focusId == '') $focusId = '#passwordConfirm';
    }
    if ($password != $passwordConfirm) {
    	$errors .= '<li>Password must match password confirmation</li>';
    	if ($focusId == '') $focusId = '#passwordConfirm';
    }
    if (!$dobOk) {
      $errors .= '<li>Enter a valid date in yyyy-mm-dd format</li>';
      if ($focusId == '') $focusId = '#dob';
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
      <div id="messages">
        <h4>User created! Welcome <?php echo $username ?>!</h4>
      </div>
    <?php } 
  }
?>

<form id="addForm" name="addForm" action="Login.php" method="post">
  <fieldset> 
    <legend>Add User</legend>
    <div class="formData">
                    
    <label class="field" for="firstName">First Name:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $firstName; ?>" name="firstName" id="firstName"/></div>

	<label class="field" for="lastName">Last Name:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $lastName; ?>" name="lastName" id="lastName"/></div>

	<label class="field" for="mInitial">Middle Initial:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $mInitial; ?>" name="mInitial" id="mInitial"/></div>

	<label class="field" for="dob">Date of Birth (yyyy-mm-dd):</label>
	<div class="value"><input type="text" size="60" value="<?php echo $dob; ?>" name="dob" id="dob"/></div>

	<label class="field" for="email">E-mail:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $email; ?>" name="email" id="email"/></div>

	<label class="field" for="emailConfirm">E-mail Confirmation:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $emailConfirm; ?>" name="emailConfirm" id="emailConfirm"/></div>

	<label class="field" for="school">School:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $school; ?>" name="school" id="school"/></div>

	<label class="field" for="username">Username:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $username; ?>" name="username" id="username"/></div>

	<label class="field" for="password">Password:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $password; ?>" name="password" id="password"/></div>

	<label class="field" for="passwordConfirm">Password Confirmation:</label>
	<div class="value"><input type="text" size="60" value="<?php echo $passwordConfirm; ?>" name="passwordConfirm" id="passwordConfirm"/></div>

    <input type="submit" value="save" id="save" name="save"/>
    </div>
  </fieldset>
</form>

    </div>
  </body>
</html>
