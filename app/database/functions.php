<?php

session_start();
require_once "connection.php";
require_once "../../path.php";

function isLoggedIn()
{
	if (isset($_SESSION['sID'])) {
		return true;
	}else{
		return false;
	}
}


?>