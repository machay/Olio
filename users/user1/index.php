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
				//outputs user's name and makes it clickable to an email address
				require 'database.php';
				$user = $_SESSION["username"];
				$query = "SELECT * FROM users";
				$result = $mysqli->query($query) or die(mysqli_error($mysqli));

				while ($row = $result->fetch_object()) {
						$name = $row->fname;
						$lname = $row->lname;
						$email = $row->email;
				}
				echo "<a href='mailto:$email'>$name $lname</a>";
				?>
			</div>
			<div id = "pic"><img src="../../resources/Logolio.png" alt="Logo"></div>
			<div id = "basicinfo">
				<ul id = "Information">
					<?php
					//outputs user's school and bio infor
					$user = $_SESSION["username"];
					$query = "SELECT * FROM users";
					$result = $mysqli->query($query) or die(mysqli_error($mysqli));

					while ($row = $result->fetch_object()) {
						$school = $row->school;
						$bio = $row->bio;
						}
				echo "<li><a>$school</a></li>";
				echo "<li><a>$bio</a></li>";
				?>
				</ul>
			</div>
			<div id="box">
				<ul id="piclist">
				<?php
				//outputs the images onto the page and into the box from the database
				$user = $_SESSION["username"];
				$query = "SELECT src FROM $user";
				$result = $mysqli->query($query) or die(mysqli_error($mysqli));

				while ($row = $result->fetch_object()) {
					$img = $row->src;
					echo "<li>$img</li>";
				}
				?>
				<script>
				//applies lightbox functionality
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
