<!DOCTYPE html>
<html>

<head>
<link src="resources/logout.css">
</head>

<body>
	<?php 
	session_start();
	session_destroy();

	echo "You have logged out";
	?>
</body>
</html>
