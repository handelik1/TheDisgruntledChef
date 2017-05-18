<head>

	<link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
	<div class = "app-area">
		<h1>TheDisgruntledChef</h1>
		<div class = "home">
			<br>
			<h2>Rate This Recipe</h2>

<script>
	function thankYou(){
		alert("Thank you for your submission!");
	}
</script>


	  <a href="TDCHome.php"><div id = "back-button">Back</div></a>


<?php
	require("connect.php");
	$recipeID = mysqli_real_escape_string($con,$_POST['recipe_ID']);

	$ratingQuery = mysqli_query($con, "select * from recipes where recipe_ID = ".$recipeID);
	$row = mysqli_fetch_array($ratingQuery);
	$outstr = '';
	$outstr .= '<form action = "ratingsubmit.php" method = "post">';
	$outstr .='<p><img class = "recipe_to_rate" src = "./img/'.$row['image'].'" /></p>
	<div id = "food_rating">

		<h3>'.$row['name'].'</h3>
		<input type = "hidden" name = "recipe_name" value = "'.$row['name'].'">
		<input type = "hidden" name = "recipe_ID" value = "'.$recipeID.'">
		<p>
		<legend>Difficulty:</legend>
		<fieldset class="rating">
    <input type="radio" id="diff5" name="diffrating" value="5" /><label for="diff5" title="Diff_5"></label>
    <input type="radio" id="diff4" name="diffrating" value="4" /><label for="diff4" title="Diff_4"></label>
    <input type="radio" id="diff3" name="diffrating" value="3" /><label for="diff3" title="Diff_3"></label>
    <input type="radio" id="diff2" name="diffrating" value="2" /><label for="diff2" title="Diff_2"></label>
    <input type="radio" id="diff1" name="diffrating" value="1" /><label for="diff1" title="Diff_1"></label>
		</fieldset>
		</p><br><br>

		<p>
		<legend>Flavor:</legend>
		<fieldset class="rating">
		<input type="radio" id="flav5" name="flavrating" value="5" /><label for="flav5" title="Five"></label>
		<input type="radio" id="flav4" name="flavrating" value="4" /><label for="flav4" title="Four"></label>
		<input type="radio" id="flav3" name="flavrating" value="3" /><label for="flav3" title="Three"></label>
		<input type="radio" id="flav2" name="flavrating" value="2" /><label for="flav2" title="Two"></label>
		<input type="radio" id="flav1" name="flavrating" value="1" /><label for="flav1" title="One"></label>
		</fieldset>
		</p><br><br>

		<p>
		<legend>Clarity:</legend>
		<fieldset class="rating">
		<input type="radio" id="clar5" name="clarrating" value="5" /><label for="clar5" title="Five"></label>
		<input type="radio" id="clar4" name="clarrating" value="4" /><label for="clar4" title="Four"></label>
		<input type="radio" id="clar3" name="clarrating" value="3" /><label for="clar3" title="Three"></label>
		<input type="radio" id="clar2" name="clarrating" value="2" /><label for="clar2" title="Two"></label>
		<input type="radio" id="clar1" name="clarrating" value="1" /><label for="clar1" title="One"></label>
		</fieldset>
		</p>
		<input onclick = "thankYou()"  type = "submit" id = "sub-button" value = "Submit Rating"/>
		</form>
	</div>';
	echo $outstr;
	mysqli_close($con);
?>


		</div>
	</div>
</body>
