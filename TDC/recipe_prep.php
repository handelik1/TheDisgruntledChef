<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<script>
	function dismiss(){
		document.getElementById('dismiss').style.display = 'none';
		document.getElementById('notice').style.display = 'none';
	}

	function goBack(){
		window.history.back();
	}
</script>

<script>
$(document).ready(function(){
if(document.getElementById('get-cookin').disabled = true){
	document.getElementById('get-cookin').style.color = "gray";
	document.getElementById('get-cookin').style.backgroundColor = "darkgray";
}
});
</script>

<script>
$(document).ready(function(){
$("input[type='checkbox'].prep-ingredient").change(function(){
    var a = $("input[type='checkbox'].prep-ingredient");
    if(a.length == a.filter(":checked").length){
        document.getElementById('get-cookin').disabled = false;
        document.getElementById('get-cookin').style.color = "black";
		document.getElementById('get-cookin').style.backgroundColor = "#c3834c";
    }
});
})
</script>

<script>
	function underConstruction(){
		alert("This feature is currently under construction. Check back soon!")
	}
</script>



<?php

require('connect.php');

	$sentRecipe = mysqli_real_escape_string($con,$_POST['recipe_ID']);

	$ingredientQuery = mysqli_query($con, "select * from ingredients where recipe_ID = ". $sentRecipe);
	$recipeQuery = mysqli_query($con, "select * from recipes where recipe_ID =" . $sentRecipe);
	$row = mysqli_fetch_array($recipeQuery);
	$c  = 1;
	$outstr = '';
	$outstr .= '<body>
	<div class = "app-area">
		<h1>TheDisgruntledChef</h1><br>
			<h2 id = "recipe-name">'.$row['name'].'</h2>
			<div id = ingredient-list>';
			foreach($ingredientQuery as $ingredient){
	$outstr .= '<input name="prep-ingredient'.$c.'" class = "prep-ingredient" id = "prep-ingredient'.$c.'" type = "checkbox" value = "'.$ingredient['general_name'].'"/><label id = "ingredient-label" for = "prep-ingredient'.$c.'"><img id = "ingredient-pic" src = "./
	img/'.$ingredient['image'].'"/>';
	$outstr .= '</label>';
			$c++;
			}
	$outstr .= '</div>';

	$outstr .= '<div id = "amounts">
					<table class = "ingredient-table">';
				foreach($ingredientQuery as $amount){
	$outstr .= 	'<tr><td>'.$amount['name'].'</td></tr>';
		}
	$outstr .= '</table></div>';

	$outstr .=	'<ul id = "nav" style = "top: -340px">
			  <li><a href="#search" onclick = "underConstruction()">Search</a></li>
			  <li><a href="#myrecipes" onclick = "underConstruction()">My Recipes</a></li>
			  <li><a href="#recentrec" onclick = "underConstruction()">Recent Recipes</a></li>
			  <li><a href="#mealplan" onclick = "underConstruction()">My Meal Plan</a></li>
				<li><a>Have Fun!</a></li>
				<li onclick = "goBack()"><a>Back</a></li>
			</ul>';
	$outstr .= '<form action = "recipe.php" method ="post">
			    <input type = "hidden" name = "recipe_ID" value = "'.$sentRecipe.'">; 
				<button id = "get-cookin" type = "submit" name = "submit" disabled>Let&#39;s Get Cookin&#39;</button>
				</form>';
	$outstr .= '<div id = "notice">As you gather your ingredients, click on their picture.
	<div id = "dismiss" onclick = "dismiss()">Dismiss</div>
	</div>';
	$outstr .= '</div>

</body>';

	echo $outstr;
	mysqli_close($con);

?>