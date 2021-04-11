<?php

$con = mysqli_connect('localhost', 'root', '', 'demo1');

@session_start(); // Start session for user

if($_SESSION['NAME'] == '') {
	// Redirect to Login Page
	header("location(login.php)");
}

?>