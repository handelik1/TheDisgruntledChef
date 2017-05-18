<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>


<script>

$(document).ready(function(){
  var cloneCount = 1;
   $("#clone-button").click(function(){
      $('#form_info_container')
          .clone()
          .attr('id', 'form_info_container'+ cloneCount++)
          .insertAfter($('[id^=form_info]:last'))
   }); 
});

</script>

<?php

require('connect.php');

	$rowQuery = mysqli_query($con, "SELECT recipe_ID FROM recipes ORDER BY recipe_ID DESC LIMIT 1;");
	$_SESSION['maxId'] = mysqli_fetch_row($rowQuery);
    $_SESSION['nextRecipe'] = $_SESSION['maxId'][0]+1;

	$recipe_name = mysqli_real_escape_string($con,$_POST['recipe_name']);
	$recipe_desc = mysqli_real_escape_string($con,$_POST['recipe_desc']);
	$recipe_image = mysqli_real_escape_string($con,$_POST['recipe_image']);

	$addRecipeQuery = "INSERT INTO `recipes`(name, description, image) VALUES ('$recipe_name','$recipe_desc','$recipe_image')";

	mysqli_query($con,$addRecipeQuery);

	$ingredientQuery = mysqli_query($con, "SELECT * FROM ingredients_general");

	$outstr = '';	

	$outstr .= '<body>
	<div class = "app-area">';	
	$outstr.= '<h1>TheDisgruntledChef</h1><br>
					<h2>Submit Recipe - Choose Ingredients</h2><br>';
	$outstr .=	'<div id = "drop_container">';
				$outstr .= '<form id = "submit_form" action = "submit3.php" method = "post">';
				$outstr .='<input type = "hidden" name = "recipe_ID" value = "'.$_SESSION['nextRecipe'].'">';
				$outstr .= '<div id = "form_info_container">';
				$outstr .= '<select name = "ingredient_general[]" class = "ingredient-drop">';
					$outstr .= '<option value = ""></option>';
						foreach($ingredientQuery as $ingredient){
						$outstr .= '<option value = "'.$ingredient['ingredient'].'">'.$ingredient['ingredient'].'</option>';
					}
				$outstr .= '</select>';
					$outstr .= '<label class = "remove-style howMuch">How much?</label><input class = "input_amount" type = "text" name = "ingredient_amount[]" size = "7"/>';
					$outstr .= '<label class = "remove-style food_pic">Image File</label><input class = "input_amount input_class" type = "text" name = "ingredient_image[]" size = "10"/>';
					$outstr .= '</div>';
				$outstr .= '<input id = "submit_step2" type = "submit" name = "submit" value = "Continue">';
				$outstr .= '</form>';		
	$outstr .= '</div>';
	$outstr .= '<button id = "clone-button" onclick = "copyField()">Add Ingredient</button>';
	$outstr .= '</div>';
	$outstr .= '<body>';
	echo $outstr;
	mysqli_close($con);

?>