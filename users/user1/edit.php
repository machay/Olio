<html>
	<head>
		<link href="../../resources/edit-stylesheet.css" rel="stylesheet" />
		<link href="../../resources/dropzone.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<script src="../../resources/dropzone.js">/</script>
		<script type="text/javascript" src="dropzoneconfig.js"></script>
	</head>
		<body>
			<ul id = "nav">
				<li id = "logo"><a href='#'> OLIO </a></li>
				<li><a href= about.html> About </a></li>
				<li><a href= contact.html> Contact </a></li>
			</ul>

			<form>
			<div id = "name"> Name: <input type = "name" name = "name" value "name" required> </div>
			<div id = "basicinfo">
				<div id = "pic"><img src="../../resources/Logolio.png" alt="Logo"></div>
				<ul id = "Information">
					<li><span class = "info"> Bio: <input type = "text" name = "bio" value "bio" placeholder = "Tell the world a bit about yourself!"> </li></span>
					<li><span class = "info"> Institution: <input type = "text" name = "institution" value "institution" required> </span>
					<li><span class = "info">Email: </span> <input type = "email" name = "email" value "email" required> </li>
				</ul>
				<button id = 'btn2' type = "submit" class = 'btn' > Save Information </button>
			</div>
			</form>
			<form action="file_upload.php" method="post" class="dropzone" id="box">
			</form>
			<button class = 'btn' id="submit">Save Pictures</button>
		</body>
</html>