<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<?php
	require("connect.php");

	$username= mysqli_real_escape_string($con,$_POST['username']);
    $password= mysqli_real_escape_string($con,$_POST['password']);

	$epass= hash('sha512', $username.$password);
	
	$userQuery= "SELECT * FROM users WHERE username= '$username' and password= '$epass'";
	
	$result = mysqli_query($con, $userQuery);
	
	$count= mysqli_num_rows($result);
	//checks if row is queried
	if($count==1){

	$_SESSION['username'] = $username;

	mysqli_close($con);

	$outstr = "";
	$outstr = '<body>
			<div class = "app-area">
				<h1>TheDisgruntledChef</h1>
				<div class = "login">
					<p id = "success">You have successfully logged in.</p>
					<a class = "check"  href = "TDCHome.php"><input class = "check" style = "top: 150px;left: 202px" type = "submit" name = "submit" value = "Homepage"></a>
				</div>

			</div>
		</body>';
	echo $outstr;

	}
	else{
	$outstr = "";
	$outstr = '<body>
			<div class = "app-area">
				<h1>TheDisgruntledChef</h1>
				<div class = "login">
					<p id = "success">Incorrect username or password</p>
					<a class = "check"  href = "index.php"><input class = "check" style = "top: 150px;left: 190px" type = "submit" name = "submit" value = "Back to Login"></a>
				</div>

			</div>
		</body>';
	echo $outstr;

	}

?>