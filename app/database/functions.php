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


// // call the login() function if register_btn is clicked
// if (isset($_POST['login_btn'])) {
// 	login();
// }

// // LOGIN USER
// function login(){
// 	global $db, $username, $errors;

// 	// grap form values
// 	$username = e($_POST['username']);
// 	$password = e($_POST['password']);

// 	// make sure form is filled properly
// 	if (empty($username)) {
// 		array_push($errors, "Username is required");
// 	}
// 	if (empty($password)) {
// 		array_push($errors, "Password is required");
// 	}

// 	// attempt login if no errors on form
// 	if (count($errors) == 0) {
// 		$password = md5($password);

// 		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
// 		$results = mysqli_query($db, $query);

// 		if (mysqli_num_rows($results) == 1) { // user found
// 			// check if user is admin or user
// 			$logged_in_user = mysqli_fetch_assoc($results);
// 			if ($logged_in_user['user_type'] == 'admin') {

				
// 				$_SESSION['user'] = $logged_in_user;
// 				$_SESSION['success']  = "You are now logged in";
// 				header('location: /');		  
// 			}else{
// 				$_SESSION['user'] = $logged_in_user;
// 				$_SESSION['success']  = "You are now logged in";

// 				header('location: /');
// 			}
// 		}else {
// 			array_push($errors, "Wrong username/password combination");
// 		}
// 	}
// }

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $uname, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$fname    =  e($_POST['fname']);
	$lname    =  e($_POST['lname']);
	$uname    =  e($_POST['uname']);
	$email    =  e($_POST['email']);
	$pass     =  e($_POST['password']);
	$cpass    =  e($_POST['cpassword']);

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) { 
		array_push($errors, "First name is required"); 
	}
	if (empty($lname)) { 
		array_push($errors, "Last name is required"); 
	}
	if (empty($uname)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($pass)) { 
		array_push($errors, "Password is required"); 
	}
	if ($pass != $cpass) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($pass);//encrypt the password before saving in the database
			$query = "INSERT INTO students (fname, lname, uname, email, password) 
					  VALUES('$fname', '$lname', '$uname', '$email', '$password')";
			mysqli_query($conn, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: login.php');				
	}
};