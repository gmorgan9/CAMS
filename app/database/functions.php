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


?>