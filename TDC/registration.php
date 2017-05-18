<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<script>
	function checkPass(){

		if(document.getElementById("password-box").value != document.getElementById("password-confirm").value){
			alert("Passwords do not match!");
    		return false;
		}
		else{
			alert("Thank you!");
			return true;
		}
	}
</script>

<body>
	<div class = "app-area">
		<h1>TheDisgruntledChef</h1>
		<div class = "login">
			<h2>Login</h2>
				<form id = "reg-form" action = "registration_success.php" onsubmit = "return checkPass();" method = "post">
					<span class = "credientials">Create a Username:</span><input id = "user" class = "userInput" type="text" name="username" size = "50" required><br><br>
					<span class = "credientials">Create a Password:</span><input id = "password-box" class = "userInput" type="password" name="password" size = "50" required><br><br>
					<span class = "credientials">Confirm Password:</span><input id = "password-confirm" class = "userInput" type="password" name="password" size = "50" required>
					<input id = "create-button" type = "submit" name = "submit" value = "Create">
				</form>
		</div>
		<img style = "left: 860px;top:-100px" id = "chef" src = "./img/chef.png">

	</div>
</body>