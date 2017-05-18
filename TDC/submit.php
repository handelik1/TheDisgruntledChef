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


	$outstr = '';	

	$outstr .= '<body>
	<div class = "app-area">';	
	$outstr.= '<h1>TheDisgruntledChef</h1><br>
		<h2>Submit Recipe</h2><br>
		<form action = "submit2.php" method = "post">
		<table id = "submit_table1">
			<tr><td><label class = "remove-style add-recipe" id = "recipe-label">Recipe Name</label><input type = "text" class = "add-recipe" name = "recipe_name" size = "40"/></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><label class = "remove-style add-recipe">Recipe Description</label><textarea class = "add-recipe" name = "recipe_desc" rows = "3" cols = 40"></textarea></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><label class = "remove-style add-recipe">Recipe Image (file name)</label><input type = "text" class = "add-recipe" name = "recipe_image" size = "40"/></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><input id = "submit_step1" type = "submit" name = "submit" value = "Continue"></tr></td>
		</table>
		</form>';
	$outstr .= '<a id = "submit-back" href = "TDCHome.php">Back</a>';
	$outstr .= '</div>
</body>';

	echo $outstr;
	mysqli_close($con);

?>