<?php 

  $username = "test_user";
  $password = "password";
  $host = "localhost";
  $dbname = "tdc";

  $con = mysqli_connect($host,$username,$password,$dbname);

  if (!$con)
  {
    die('Could not connect: ' . mysqli_error());
  }

 ?>