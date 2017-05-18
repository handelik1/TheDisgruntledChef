<?php
	require("connect.php");
	$recipe_name = mysqli_real_escape_string($con,$_POST['recipe_name']);
	$recipe_ID = mysqli_real_escape_string($con,$_POST['recipe_ID']);
	$difficulty = mysqli_real_escape_string($con,$_POST['diffrating']);
	$flavor = mysqli_real_escape_string($con,$_POST['flavrating']);
	$clarity = mysqli_real_escape_string($con,$_POST['clarrating']);

	$addRatingQuery = "INSERT INTO `rating`(recipe_ID, name, difficulty, flavor, clarity) VALUES ('$recipe_ID','$recipe_name','$difficulty', '$flavor', '$clarity')";

	mysqli_query($con,$addRatingQuery);

	mysqli_close();

	header('Location: TDCHome.php');


?>