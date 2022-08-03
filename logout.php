<?php

require_once "database/connection.php";

session_start();
session_unset();
session_destroy();

header('location:student-login.php');

?>