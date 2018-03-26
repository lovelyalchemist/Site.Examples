<?php
$servername = "localhost";
$username = "user";
$password = "";
$dbname = "blogsite";
$con = mysqli_connect("localhost","user","","blogsite");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
