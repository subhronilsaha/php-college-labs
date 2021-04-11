<?php

include('extra/connection.php');

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
                <div>
                    <h3>Modules available</h3>
                    <br>
                    <ul>
                        <li><a href="user_modules/get_users.php">STUDENT MODULE</a></li>
                        <li><a href="course_modules/get_courses.php">COURSE MODULE</a></li>
                    </ul>
                </table>
                </div>
            </div>
            <div class="right-side"><h1>RIGHT SIDE</h1></div>
        </div>
    </div>
</body>
</html>