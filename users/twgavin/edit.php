<html>
	<head>
		<link href="../../resources/edit-stylesheet.css" rel="stylesheet" />
		<link href="../../resources/dropzone.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>		
		<script src="../../resources/dropzone.js">/</script>
		<script type="text/javascript" src="../../dropzoneconfig.js"></script>
		<link rel="stylesheet" type="text/css" href="../../resources/spectrum.css">
	</head>
		<body>
			<ul id = "nav">
				<li id = "logo"><a href= index.php> OLIO </a></li>
				<li><a href= index.php> Home </a></li>
				<li><a href= about.html> About </a></li>
				<li><a href= contact.html> Contact </a></li>
				<li><a href= logout.php> Log Out </a></li>
				<li id = "settings">
					<a href='#'><img src="../../resources/settings.png" alt="settings"></a>
					<span><a href='edit.php'>Edit</a></span>
					<div id="settingsBox">
						<input type='text' id="flat" />
					</div>
				</li>
			</ul>

			<form action="edit-info.php" method="POST">
			<div id = "name"> Your Name </div>
			<div id = "pic"><img src="../../resources/Logolio.png" alt="Logo"></div>
			<div id = "basicinfo">
				<ul id = "Information">
					<li><span class = "info"> Biography: </span><input id = "bioinfo" type = "text" name = "bio" value "bio" placeholder = "Tell the world a bit about yourself!"> </li>
					<li><span class = "info"> Institution: </span><input type = "text" name = "institution" value "institution"</li>
					<li><span class = "info">Email: </span> <input type = "email" name = "email" value "email"> </li>
					<button id = 'btn2' type = "submit" class = 'btn' > Save Information </button>
				</ul>
			</div>
			</form>
			<div>
			<form action="file_upload.php" method="post" class="dropzone" id="box">
			</form>
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
		</body>
</html>
