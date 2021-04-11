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
        <div class="photo-container">
            <img src="assets/myphoto.jpeg" alt="" width="120">
        </div>
        <div class="header">
            <div class="name-details">
                <h1>Subhronil Saha, CSE 3E, 70</h1>
            </div>
            <ul class="navbar">
                <li><a href="index.php"> Modules</a></li>
            </ul>
        </div>
    </div>
        <div class="content">
            <div class="left-side"><h1>LEFT SIDE</h1></div>
            <div class="middle"> 
                <!-- <h1>MODULES AVAILABLE</h1>  -->
                <h1 class="cyan">Student Management System</h1>
                <br>
                <h2> Login </h2>
                <br>
                <form method="post" action="login_do.php" enctype="multipart/form-data">
                    <table>
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
                                <input type="submit" name="login" value="LOGIN">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="right-side"><h1>RIGHT SIDE</h1></div>
        </div>
    </div>
</body>
</html>