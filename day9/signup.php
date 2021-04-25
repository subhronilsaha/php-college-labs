<?php

//ini_set('display_errors', 1);

if($_SESSION['NAME'] != '') {
    echo $_SESSION['NAME'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Day 1 Assignment | Software Engineering </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class = "header-container">
        <div class="header">
            <div class="name-details">
                <h3>Software Engineering Lab Day 9</h3>
            </div>
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
        <div class="content">
            <div class="left-side"></div>
            <div class="middle"> 
                <!-- <h1>MODULES AVAILABLE</h1>  -->
                <h2> Sign Up </h2>
                <br>
                <form method="post" action="login_do.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value=""></td>
                        </tr>
                        <tr>
                            <td>Email ID</td>
                            <td><input type="text" name="email" value=""></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td> 
                                <input type="submit" name="signup" value="REGISTER">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="right-side"></div>
        </div>
    </div>
</body>
</html>