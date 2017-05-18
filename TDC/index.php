<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>


<body>
	<div class = "app-area">
		<h1>TheDisgruntledChef</h1>
		<div class = "login">
			<h2>Login</h2>
				<form id = "login-form" action = "login_check.php" method = "post">
					<span class = "credientials">Username:</span><input class = "userInput" type="text" name="username" size = "50" required><br><br>
					<span class = "credientials">Password:</span><input id = "password-box" class = "userInput" type="password" name="password" size = "50" required><br><br>
					<input type = "submit" name = "submit" value = "LOGIN">
					<div style = "position: relative; left: 130px; font-size: 26px; top: -122px; left:320px; color: black;">OR</div>
					<a href = "#"><img id = "facebook" src = "./img/facebook.png"/></a>
					<div class = "submit"><a href = "TDCHome.php">Continue As Guest</a></div>
					<div id = "register" class = "submit"><a href = "registration.php">Register</a></div>
					<img id = "chef" src = "./img/chef.png">
				</form>
		</div>

	</div>
</body>