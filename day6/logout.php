<?php

$con = mysqli_connect('localhost', 'root', '', 'demo1');

@session_destroy(); // Start session for user

//$_SESSION['NAME'] == ''
// Redirect to Login Page
header("location: login.php");


?>