<?php

require_once "app/database/connection.php";

$uname = $_SESSION['uname'];
$sql = "UPDATE students SET loggedin='0' WHERE uname='$uname'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
session_start();
session_unset();
session_destroy();
header('location:student-login.php');

?>