<?php
	session_start();
?>
<head>

	<link rel = "stylesheet" type = "text/css" href = "bootstrap.css">	
	<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<script>
	//Clicking on any step will toggle that step's instruction and hides any displayed media
	//the full recipe window, and the closing button
	$(document).ready(function(){
		$('[id^=step]').click(function(){
			var val = $(this).val();
			$("div[id^='instruction']").each(function(){
				$(this).toggle($(this).attr('id') === 'instruction' + val);
				$("img[id^='display']").hide();
				$("#close").hide();
				$("#full-recipe").hide();
			}); 
		});
	});

</script>

<script>
	//Clicking on any step will toggle that step's media button.
	$(document).ready(function(){
		$('[id^=step]').click(function(){
			var val = $(this).val();
			$(this).css("background", "lightblue");
			var buttonValue = this.id;
   		    $('[id^=step]').not('#' + buttonValue).css('background', '#c3834c');
			$("button[id^='media']").each(function(){
				$(this).toggle($(this).attr('id') === 'media' + val);
			}); 
		});
	});

</script>

<script>
	//Clicking on any media button will show that button's media and closing button
	$(document).ready(function(){
		$('[id^=media]').click(function(){
			var val = $(this).val();
			$("img[id^='display']").each(function(){
				$(this).toggle($(this).attr('id') === 'displayMedia' + val);
				$('#close').show();
			}); 
		});
	});

</script>

<script>
	//Clicking on the close button will hide the media and the close button
	$(document).ready(function(){
		$('#close').click(function(){
			$("img[id^='display']").each(function(){
				$("img[id^='display']").hide();
				$("#close").hide();
			}); 
		});
	});
</script>

<script>
	//Clicking on the full recipe button will display the full recipe and hide the close recipe button
	$(document).ready(function(){
		$('#full_recipe').click(function(){
			$('#full-recipe').show();
			$('#hide_full_recipe').show();
			$('#full_recipe').hide();
		});
	});
</script>

<script>
	//Clicking on the hide recipe button will hide the full recipe and show the display recipe button
	$(document).ready(function(){
		$('#hide_full_recipe').click(function(){
			$('#full-recipe').hide();
			$('#hide_full_recipe').hide();
			$('#full_recipe').show();
		});
	});
</script>



<?php

require("connect.php");

$recipeID = mysqli_real_escape_string($con,$_POST['recipe_ID']);

$query1 = mysqli_query($con, "select * from recipes where recipe_ID = ".$recipeID);
$query2 = mysqli_query($con, "select * from instructions where recipe_ID = ".$recipeID);
$query3 = mysqli_query($con, "select * from ingredient_general where recipe_ID = ".$recipeID);

$row1 = mysqli_fetch_assoc($query1);
$row2 = mysqli_fetch_assoc($query2);


$outstr = '';
	$outstr .= '<body>
	<div class = "app-area">
		<h1 style = "padding-left: 205px">TheDisgruntledChef</h1><br>
			<h2 style = "padding-left: 205px" id = "recipe-name">'.$row1['name'].'</h2>

	<div id = "mysteps">';
	$c = 1;
	$d = 1;
	$e = 1;
	$f = 1;
	foreach($query2 as $steps){
		$outstr .= '<button class = "this_step" id = "step'.$c.'" value = "'.$c.'">Step '.$c.'</button>';
		$c++;
	}	
	$outstr .= '<button id = "full_recipe">Show Full Recipe</button>';
	$outstr .= '<button class = "begin-hidden" id = "hide_full_recipe">Hide Full Recipe</button>';
	$outstr .= '<a id = "home-button" href = "TDCHome.php"><button>Homepage</button></a>';
	$outstr .= '</div>';
	$outstr .= '<div id = "i-container">';
	foreach($query2 as $instructions){
		$outstr .= '<div class = "begin-hidden showInstruction" id = "instruction'.$d.'">'.$d.'. '.$instructions['instruction'].'</div>';
		$d++;
	}

	$outstr .= '</div>';
	$outstr .= '<div id = "m-container">';
	foreach($query2 as $media){
		$outstr .= '<button class = "begin-hidden showMediaButton" id = "media'.$e.'" value = "'.$e.'">Show Media</button>';
		$outstr .= '<img class = "begin-hidden showMedia" src = "./img/'.$media['media'].'" id = "displayMedia'.$e.'">';
		$outstr .= '<div id = "close'.$e.'" class = "begin-hidden">x</div>';
		$e++;
	}

	$outstr .= '</div>';
	$outstr .= '<div id = "close" class = "begin-hidden">x</div>';
	$outstr .= '<div class ="begin-hidden" id = "full-recipe">';
	foreach($query2 as $full){
		$outstr .= '<p id = "individualStep">'.$f.'. '.$full['instruction'].'</p>';
		$f++;
	}
	$outstr .= '</div>';
	$outstr .= '</div>';

	echo $outstr;

?>


