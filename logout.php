<?php
session_start();
require_once "app/database/connection.php";

$sID = $_SESSION['sID'];
$sql = "UPDATE students SET loggedin='0' WHERE studentID='$sID'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

session_unset();
session_destroy();
header('location:student-login.php');

?>