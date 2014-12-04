<!DOCTYPE html>
<html>

<head>
<link src="resources/logout.css">
</head>

<body>
	<?php 
		session_start();
		session_destroy();
		header('Location: login.php');
		exit;
	?>
</body>
</html>
