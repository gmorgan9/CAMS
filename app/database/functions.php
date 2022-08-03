<?php

session_start();
require_once "connection.php";

function isLoggedIn()
{
	if (isset($_SESSION['uname'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_POST['logout'])) {
	session_destroy();
	session_unset();
	header("location: index.php");
}



?>