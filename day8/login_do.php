<?php
ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'demo1');

if (isset($_REQUEST['login'])) {
	
	$query = "SELECT * FROM admin WHERE email = '" . $_REQUEST['email'] . "' and password = '" . $_REQUEST['password'] . "' and status = 'active'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result); // Count number of rows in result
	echo $count;
	if($count == 0) {
		header("location: login.php");
	}
	$fetch = mysqli_fetch_object($result);
	echo $fetch->email;

	if ($count > 0) {
		@session_start();
		$_SESSION['AID'] = $fetch->id; // AID = Admin ID
		$_SESSION['NAME'] = $fetch->name;
		$_SESSION['EMAIL'] = $fetch->email;
		header("location: index.php");
	}

}

if (isset($_REQUEST['logout'])) {
	session_start();
	session_destroy(); // Stop session for user
	header("location: login.php"); // Redirect to Login Page
}

?>