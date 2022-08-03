<?php

require_once "connection.php";


$fName    = $_POST['fName'];
$lName    = $_POST['lName'];
$uName    = $_POST['uName'];
$email    = $_POST['email'];
$gender   = $_POST['gender'];
$password = $_POST['password'];


$select = "select * from students where uName = '$uName'";

$result = mysqli_query($conn, $select);

$num = mysqli_num_rows($result);

if($num == 1) {
    // echo "Username is already taken";
} else {
    $register = "insert into students (fName, lName, uName, email, gender, password) values ('$fName', '$lName', '$uName', '$email', '$gender', '$password')";
    mysqli_query($conn, $register);
    echo "registration Successful";
}


?>