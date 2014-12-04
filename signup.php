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
	$usertable = "CREATE TABLE IF NOT EXISTS " . $user . "(
	`id` int(11) NOT NULL,
  	`src` varchar(255) NOT NULL
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4";
	$modtable= "ALTER TABLE " . $user . "
 	ADD PRIMARY KEY (`id`);";
	$mysqli->query($usertable) or die(mysqli_error($mysqli));
	$mysqli->query($modtable) or die(mysqli_error($mysqli));

	//Directory manipulation here
	$index_file = './users/user1/index.php';
	$edit_file = './users/user1/edit.php';
	$database_file = './users/user1/database.php';
	//add these files
	$file_upload = './users/user1/file_upload.php';
	$edit_info = './users/user1/edit_info.php';
	
	$new_index = './users/' . $user . '/index.php';
	$new_edit = './users/' . $user . '/edit.php';
	$new_database = './users/' . $user . '/database.php';
	$userdir = './users/' . $user .'/';
	$useruploads = './users/' . $user .'/uploads/';
	
	$new_fileup = './users/' . $user . '/file_upload.php';
	$new_editinfo = './users/' . $user . '/edit_info.php';
	if (!mkdir($userdir, 0777, true)) {
    		die('Failed to create folders...');
    	}
    if (!mkdir($useruploads, 0777, true)) {
   		die('Failed to create folders...');
   	}
   	if (!copy($index_file, $new_index)) {
   		echo "failed to copy $index_file...\n";
	}
	if (!copy($edit_file, $new_edit)) {
    	echo "failed to copy $edit_file...\n";
	}
	if (!copy($database_file, $new_database)) {
    	echo "failed to copy $database_file...\n";
	}
	if (!copy($file_upload, $new_fileup)) {
    	echo "failed to copy $file_upload...\n";
	}
	copy($file_upload, $new_fileup);
	if (!copy($edit_info, $new_editinfo)) {
    	echo "failed to copy $edit_info...\n";
	}
	copy($edit_info, $new_editinfo);
	header("location: index.php");
	mysql_close($conn);

	?>
