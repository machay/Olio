<html>
	<head>
		<link href="../../resources/stylesheet.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="../../resources/spectrum.css">
	</head>
		<body>
			<ul id = "nav">
				<li id = "logo"><a href= portfolio.html> OLIO </a></li>
				<li><a href= portfolio.html> Home </a></li>
				<li><a href= ../../about.html> About </a></li>
				<li><a href= ../../contact.html> Contact </a></li>
				<li><a href= ../../logout.php> Log Out </a></li>
				<li id = "settings">
					<a href='#'><img src="../../resources/settings.png" alt="settings"></a>
					<span><a href='edit.php'>Edit</a></span>
				</li>
			</ul>

			<div id = "name"> Jamie Smith </div>
			<div id = "pic"><img src="../../resources/Logolio.png" alt="Logo"></div>
			<div id = "basicinfo">
				<ul id = "Information">
					<li> Tell the world a bit about yourself! What makes you special? What are you passionate about? Write it here! </li>
					<!-- <li><span class = "info"> Institution: </span>Rensselaer Polytechnic Institute </li>
					<li><span class = "info">Email: </span><a href="mailto:someone@example.com">someone@example.com</a></li> -->
					<li>Copyright © 2014 Jamie Smith</p> 
				</ul>
			</div>
			<div id="box"></div>
				<ul id="photos">
				<?php
				require 'database.php';
				session_start();

				$user = $_SESSION["username"];
				$query = "SELECT tag FROM $user";
				$result = $mysqli->query($query) or die(mysqli_error($mysqli));

				while ($row = $result->fetch_object()) {
					$img = $row->tag;
					echo "<li>$img</li>";
				}
				?>
				</ul>
			</div>
			<script type="text/javascript" src="../../resources/docs/jquery-1.9.1.js"></script>
	    <script type="text/javascript" src="../../resources/spectrum.js"></script>
		
		<script>
		    $("#flat").spectrum({
			    color: "#f00",
			    change: function(color) {
				     $("#nav").css("background-color", color.toHexString());
				}
			});
			$('#settingsBox').hide();
		    $("#settings").click(function() {
		    	$('#settingsBox').toggle();
		    });
		</script>
			<button class = 'btn'><a href = edit.php> Edit Portfolio </a></button>
		</body>
</html>