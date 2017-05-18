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

<script>
	function thankYou(){
		alert("Thank you for your submission!");
	}
</script>

<?php

require('connect.php');

	$ingredient_general = $_POST['ingredient_general'];
	$ingredient_amount = $_POST['ingredient_amount'];
	$ingredient_image = $_POST['ingredient_image'];
	$recipe_ID = $_POST['recipe_ID'];

	$c = count($ingredient_general);

	for($i = 0; $i < $c; $i++){
	$name = $ingredient_amount[$i]." ".$ingredient_general[$i];

	$addIngredientQuery = "INSERT INTO `ingredients`(recipe_ID, name, general_name, image) VALUES ('$recipe_ID', '$name', '{$ingredient_general[$i]}', '{$ingredient_image[$i]}')";
	mysqli_query($con,$addIngredientQuery);
}

$outstr = '';	

	$outstr .= '<body>
	<div class = "app-area">';	
	$outstr.= '<h1>TheDisgruntledChef</h1><br>
					<h2>Submit Recipe - Choose Ingredients</h2><br>';
	$outstr .=	'<div id = "drop_container1">';
				$outstr .= '<form id = "submit_form" action = "submit4.php" method = "post">';
				$outstr .='<input type = "hidden" name = "recipe_ID" value = "'.$recipe_ID[0].'">';
				$outstr .= '<div id = "form_info_container">';
				$outstr .= '<label class = "remove-style" id = "step_label">Add a Step</label><textarea id = "recipe_step" name = "recipe_step[]" rows = "3" cols = "40"></textarea>';
					$outstr .= '</div>';
				$outstr .= '<input id = "submit_step3" onclick = "thankYou()" type = "submit" name = "submit" value = "Submit">';
				$outstr .= '</form>';		
	$outstr .= '</div>';
	$outstr .= '<button id = "clone-button" onclick = "copyField()">Add a Step</button>';
	$outstr .= '</div>';
	$outstr .= '<body>';
	echo $outstr;

	mysqli_close($con);

?>