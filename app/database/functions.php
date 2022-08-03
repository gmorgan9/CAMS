<?php

session_start();
require('connection.php');
require("path.php");

function isLoggedIn()
{
	if (isset($_SESSION['sID'])) {
		return true;
	}else{
		return false;
	}
}


// if(isset($_POST['login_btn'])){
// 	login();
// }

// function login() {

// 	$sID = mysqli_real_escape_string($conn, $_POST['studentID']);
// 	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
// 	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
// 	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
// 	$email = mysqli_real_escape_string($conn, $_POST['email']);
// 	$pass = md5($_POST['password']);
// 	$cpass = md5($_POST['cpassword']);
// 	$isadmin = $_POST['isadmin'];
// 	$loggedin = $_POST['loggedin'];
 
// 	$select = " SELECT * FROM students WHERE uname = '$uname' && password = '$pass' ";
 
// 	$result = mysqli_query($conn, $select);
 
// 	if(mysqli_num_rows($result) > 0){
 
// 	   $row = mysqli_fetch_array($result);
// 	   $sql = "UPDATE students SET loggedin='1' WHERE uname='$uname'";
// 	   if($row['isadmin'] == 1){
// 		  if (mysqli_query($conn, $sql)) {
// 			 echo "Record updated successfully";
// 		   } else {
// 			 echo "Error updating record: " . mysqli_error($conn);
// 		   }
// 		  $_SESSION['admin_fname'] = $row['fname'];
// 		  $_SESSION['sID'] = $row['studentID'];
// 		  $_SESSION['loggedin'] = $row['loggedin'];
// 		  $_SESSION['admin_lname'] = $row['lname'];
// 		  $_SESSION['isadmin'] = $row['isadmin'];
// 		  header('location: admin/profile.php');
// 	   }elseif($row['isadmin'] == 0){
// 		  if (mysqli_query($conn, $sql)) {
// 			 echo "Record updated successfully";
// 		   } else {
// 			 echo "Error updating record: " . mysqli_error($conn);
// 		   }
// 		  $_SESSION['user_fname'] = $row['fname'];
// 		  $_SESSION['sID'] = $row['sID'];
// 		  $_SESSION['loggedin'] = $row['loggedin'];
// 		  $_SESSION['user_lname'] = $row['lname'];
// 		  $_SESSION['isadmin'] = $row['isadmin'];
// 		  header('location: profile.php');
// 	   }
	  
// 	}else{
// 	   $error[] = 'incorrect email or password!';
// 	}
 
//  };


?>