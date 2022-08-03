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

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}



?>