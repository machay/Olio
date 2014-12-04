<?php
require 'database.php';
session_start();

$ds = DIRECTORY_SEPARATOR;

$storeFolder = 'uploads';

if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . $ds. $storeFolder . $ds;
	$targetFile = $targetPath. $_FILES['file']['name'];

	move_uploaded_file($tempFile, $targetFile);
	$filename = $_FILES['file']['name'];
	$user = $_SESSION['username'];
	$src = "<img class='pics' src=uploads/$filename alt='picture' data-glisse-big=uploads/$filename style='max-height: 300px;'>";
	$src = mysql_real_escape_string($src);
	$update_query = "INSERT INTO user1 (src) 
	VALUES ('$src')";

	$result = $mysqli->query($update_query) or die(mysqli_error($mysqli));	
}

?>