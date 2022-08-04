<?php

session_start();
require('connection.php');
require("../../path.php");

function isLoggedIn()
{
	if (isset($_SESSION['sID'])) {
		return true;
	}else{
		return false;
	}
}