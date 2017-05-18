<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<?php
	require('connect.php');

  	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$epass = hash('sha512', $username.$password);

	$userQuery = "INSERT INTO `users`(username, password) VALUES ('$username','$epass')";
	
	mysqli_query($con,$userQuery);

	mysqli_close($con);
?>

<body>
	<div class = "app-area">
		<h1>TheDisgruntledChef</h1>
		<div class = "login">
			<p id = "success">You have successfully registered</p>
			<a href = "index.php"><input style = "top: 150px" type = "submit" name = "submit" value = "Login"></a>
		</div>

	</div>
</body>