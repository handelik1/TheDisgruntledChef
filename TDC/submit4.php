<?php
require('connect.php');

	$recipe_ID = mysqli_real_escape_string($con,$_POST['recipe_ID']);
	$recipe_step = $_POST['recipe_step'];

	$c = count($recipe_step);
	$stepNum = 1;
	for($i = 0; $i < $c ;$i++){
	$step = "Step"." ".$stepNum;
	$addInstructionQuery = "INSERT INTO `instructions`(step, recipe_ID, instruction) VALUES ('$step', '$recipe_ID', '{$recipe_step[$i]}')";
	mysqli_query($con,$addInstructionQuery);
	$stepNum++;
}
	mysqli_close($con);

	header('Location: TDCHome.php');


	?>
