<?php
require 'database.php';
session_start();

$ds = DIRECTORY_SEPARATOR;

$storeFolder = 'uploads/';

if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . $ds. $storeFolder . $ds;
	$targetFile = $targetPath. $_FILES['file']['name'];

	move_uploaded_file($tempFile, $targetFile);
/*
	$src = "<img src='$targetPath' alt='picture' />"
	$update_query = "INSERT INTO uploads (tag)
	VALUES ('$src')";

	$result = $mysqli->query($update_query) or die(mysqli_error($mysqli));
	*/
}

?>