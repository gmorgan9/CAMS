<?php
$servername = "localhost";
$username = "garrett";
$password = "BIGmorgan1999!";
$database = "user_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>