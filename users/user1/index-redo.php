<html>
	<head>
		<script type="text/javascript" src="../../resources/docs/jquery-1.9.1.js"></script>
	    <script type="text/javascript" src="../../resources/spectrum.js"></script>
		<script src="../../resources/glisse.js"></script>	
		<link rel="stylesheet" href="../../resources/glisse.css" />
		<link rel="stylesheet" href="../../resources/app.css" />
		<link href="../../resources/stylesheet.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../../resources/spectrum.css">

	</head>
		<body>
			<ul id = "nav">
				<li id = "logo"><a href= index.php> OLIO </a></li>
				<li><a href= index.php> Home </a></li>
				<li><a href= ../../about.html> About </a></li>
				<li><a href= ../../contact.html> Contact </a></li>
				<li><a href= ../../logout.php> Log Out </a></li>
				<li id = "settings">
					<a href='#'><img src="../../resources/settings.png" alt="settings"></a>
					<span><a href='edit.php'>Edit</a></span>
				</li>
			</ul>

			<div id = "name">
				<?php
				require 'database.php';
				$user = $_SESSION["username"];
				$query = "SELECT * FROM $user";
				$result = $mysqli->query($query) or die(mysqli_error($mysqli));

				while $row = $result->fetch_object()) {
						$name = $row->$fname;
						}
				echo "<a href="mailto:$email">$name</a>";
				?>
			</div>
			<div id = "pic"><img src="../../resources/Logolio.png" alt="Logo"></div>
			<div id = "basicinfo">
				<ul id = "Information">
					<li>
					<?php
					require 'database.php';
					$user = $_SESSION["username"];
					$query = "SELECT * FROM $user";
					$result = $mysqli->query($query) or die(mysqli_error($mysqli));

					while $row = $result->fetch_object()) {
						$school = $row->$school;
						}
				echo "<a>$school</a>";
				?>

					<!--Tell the world a bit about yourself! What makes you special? What are you passionate about? Write it here! </li>
					<!-- \<li><span class = "info"> Institution: </span>Rensselaer Polytechnic Institute </li>
					<li><span class = "info">Email: </span><a href="mailto:someone@example.com">someone@example.com</a></li> -->
				</ul>
			</div>
			<div id="box">
				<ul id="piclist">
				<?php
				require 'database.php';
				//session_start();

				$user = $_SESSION["username"];
				$query = "SELECT src FROM $user";
				$result = $mysqli->query($query) or die(mysqli_error($mysqli));

				while ($row = $result->fetch_object()) {
					$img = $row->src;
					echo "<li>$img</li>";
				}
				?>
				<script>
				$(function () {
				    $('.pics').glisse({
				        changeSpeed: 550, 
				        speed: 500,
				        effect:'bounce',
				        fullscreen: false
				    }); 
				});
				</script>
				</ul>
			</div>
		
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
</html>
