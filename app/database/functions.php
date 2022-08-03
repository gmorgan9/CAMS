<?php

session_start();
require_once "connection.php";

function isLoggedIn()
{
	if (isset($_SESSION['loggedin']) === 1) {
		return true;
	}else{
		return false;
	}
}


?>