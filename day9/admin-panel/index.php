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
        <div class="header">
            <div class="name-details">
            <h3>Software Engineering Lab Day 9</h3>
            </div>
            <ul class="navbar">
                <li><a href="login_do.php?logout=true">Logout</a></li>
            </ul>
        </div>
    </div>
        <div class="content">
            <div class="left-side">
                <h3> Welcome <?php echo $_SESSION['NAME']; ?> </h3>
            </div>
            <div class="middle"> 
                <!-- <h1>MODULES AVAILABLE</h1>  -->
                <h1 class="cyan">Modules</h1>
                <br>
                <div>
                    <ul>
                        <li><a href="item_modules/get_item.php">All items </a></li>
                        <li><a href="category_modules/get_category.php">Categories </a></li>
                    </ul>
                </table>
                </div>
            </div>
            <div class="right-side">
            </div>
        </div>
    </div>
</body>
</html>