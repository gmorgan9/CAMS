<?php
$servername = "localhost";
$username = "garrett";
$password = "BIGmorgan1999!";
$database = "cams";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>