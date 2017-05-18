<?php
	session_start();
?>
<?php
	require("connect.php");

	unset($_SESSION["username"]); 
	header("Location: index.php");

?>