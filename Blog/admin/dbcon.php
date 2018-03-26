<?php
$servername = "localhost";
$username = "root";
$password = "999bardak";
$dbname = "blogsite";
$con = mysqli_connect("localhost","root","999bardak","blogsite");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
