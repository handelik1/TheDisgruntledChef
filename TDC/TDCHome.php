<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<script>
	function underConstruction(){
		alert("This feature is currently under construction. Check back soon!");
	}
</script>

<body>
<?php
	require('connect.php');
	$outstr = '';

	$outstr .= '<div class = "app-area">
		<h1>TheDisgruntledChef</h1>
		<div class = "home">';

	include('nav.php');

	$recipeQuery = mysqli_query($con, "select * from recipes");

	$outstr .='<div id = "content" class = "home-recipe">';

			foreach($recipeQuery as $recipe){

			$outstr .='<div class = "food-link" href="#cake">
				<form action = "recipe_prep.php" method = "post">
				<input type = "hidden" name = "recipe_ID" value = "'.$recipe['recipe_ID'].'">
			 	<input id = "recipe_name" type = "submit" value = "'.$recipe['name'].'"/>
				<input type = "image" src = "./img/'.$recipe['image'].'" class = "home-recipe"/>
			  <p style = "height: 40px;" class = "home-recipe">'.$recipe['description'].'</p>
				<br>
				</form>
			</div>';
			$outstr .= '<form action = "TDCRating.php" method = "post">
					<input type = "hidden" name = "recipe_ID" value = "'.$recipe['recipe_ID'].'">
					<input id = "rating-button" type = "submit" value = "Rate this Recipe"/>
					</form>';

			}	
	$outstr .= '</div>';


	$outstr .=	'<img style = "left: 870px;top:-560px" id = "chef" src = "./img/chef.png">
				</div>';

				if(isset($_SESSION['username'])){
					$outstr .= '<a class = "logout" id = "logout" href = "logout.php">Logout</a>';
					$outstr .= '<a class = "submit-button" id = "submit-button" href = "submit.php">Submit a Recipe</a>';
				}
				else{
					$outstr .= '<a class = "logout" href = "index.php">Login</a>';
				}

		


	$outstr .= '</div>';

	echo $outstr;
?>
			
</body>

