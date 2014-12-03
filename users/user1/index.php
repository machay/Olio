<html>
	<head>
		<link href="../../resources/stylesheet.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	</head>
		<body>
			<ul id = "nav">
				<li id = "logo"><a href='#'> OLIO </a></li>
				<li><a href= about.html> About </a></li>
				<li><a href= contact.html> Contact </a></li>
			</ul>

			<div id = "name"> Jamie Smith </div>
			<div id = "basicinfo">
				<div id = "pic"><img src="../../resources/Logolio.png" alt="Logo"></div>
				<ul id = "Information">
					<li> Tell the world a bit about yourself! The second sentence is for evil reasons. </li>
					<li><span class = "info"> Institution: </span>Rensselaer Polytechnic Institute </li>
					<li><span class = "info">Email: </span><a href="mailto:someone@example.com">someone@example.com</a></li>
				</ul>
			</div>
			<div id = "box">
				<ul id="photos">
				<?php
				session_start();

				$query = "SELECT tag FROM uploads";
				$result = $mysqli->query($query) or die(mysqli_error($mysqli));

				while ($row = $result->fetch_object()) {
					$img = $row->tag;
					echo "<li>$img</li>"
				}
				?>
				</ul>
			</div>
			<button class = 'btn'><a href = edit.php> Edit Portfolio </a></button>
		</body>
</html>