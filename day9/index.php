<?php
    $con = mysqli_connect('localhost', 'root', '', 'demo1');
    @session_start(); // Start session for user

    ini_set('display_errors', 1);

    // FETCH Category DATA
    $query1 = "select * from categories where status='active'";
    $result1 = mysqli_query($con, $query1);

    if(isset($_REQUEST['cid'])) {
        if($_REQUEST['cid'] == "") {
            $query = "SELECT * FROM items";
            $result = mysqli_query($con, $query);
        } else {
            $query = "SELECT * FROM items WHERE c_id = '" . $_REQUEST['cid'] . "'";
            $result = mysqli_query($con, $query);
        }
        
    } else {
        $query = "SELECT * FROM items";
        $result = mysqli_query($con, $query);
    }

    if (isset($_POST['done'])) {
        $dest = "location: index.php?cid=" . $_POST['categories'];
        echo $dest;
        header($dest);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <li><a href="login.php"> Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
        <div class="content">
            
            <div class="left-side">
                
                <h3>Select Category</h3>

                <form method="post" action="">
                    <select name="categories" id="categories">
                        <?php 
                        // echo $_REQUEST['cid'];
                        while($fetch1 = mysqli_fetch_object($result1)) { 
                        ?>
                            <option 
                            value="<?php echo $fetch1->c_id; ?>"
                            <?php
                                if (isset($_REQUEST['cid']) && $_REQUEST['cid'] == $fetch1->c_id) {
                            ?> 
                            selected 
                            <?php
                                }
                            ?>"
                            >
                                <?php echo $fetch1->c_name; ?>
                            </option>
                        <?php 
                        }
                        ?>
                            <option
                                value=""
                        <?php 
                            if(!isset($_REQUEST['cid']) || $_REQUEST['cid'] == "" ) {
                        ?>
                            selected
                        <?php 
                            }
                        ?>
                            >
                                All
                            </option>
                    </select>

                    <br>

                    <input type="submit" name="done" value="DONE">

                </form>

            </div>

            <div class="middle"> 
                <h1>Items Available</h1> 

                <br>
                
                <table>
                    <tr>
                        <td> <b> ID  </b> </td>
                        <td> <b> Photo        </b> </td>
                        <td> <b> Name         </b> </td>
                        <td> <b> Category   </b> </td>
                        <td> <b> Price   </b> </td>
                        <!-- <td> <b> Quantity   </b> </td> -->
                    </tr>
                    <?php while($fetch = mysqli_fetch_object($result)) { ?>
                    <tr>
                        <td> <?php echo $fetch->id; ?> </td>
                        <td> 
                            <img 
                            src="admin-panel/item_modules/item_images/<?php echo $fetch->image_name; ?>" 
                            width=50 
                            height=50>
                        </td>
                        <td> <?php echo $fetch->name; ?> </td>
                        <?php 
                            $query1 = "select c_name from categories where c_id = '" . $fetch->c_id . "'";
                            $result1 = mysqli_query($con, $query1);
                            $fetch1 = mysqli_fetch_object($result1);
                        ?>
                        <td> <?php echo $fetch1->c_name; ?> </td>
                        <td> ₹ <?php echo $fetch->price; ?> </td>
                        <!-- <td> <?php //echo $fetch->qty; ?> </td> -->
                        <td> <a href="cart.php?id=<?php echo $fetch->id; ?>"> Add to Cart </a></td>
                    </tr>
                    <?php } ?>
                </table>

                <br>

            </div>

            <div class="right-side">

                <div>

                <h3> Your Cart Details  </h3>

                <p> Items in Cart: </p>
                
                <h1>
                    <?php
                        $_SESSION['cart'] = session_id();
                        $query = "SELECT DISTINCT p_id FROM order_session WHERE session='" . $_SESSION["cart"] . "'";
                        $orders_select = mysqli_query($con, $query);
                        
                        if (!$orders_select || mysqli_num_rows($orders_select) == 0) {
                            $c = 0;
                        } else {
                            $c = mysqli_num_rows($orders_select);
                        }

                        echo $c;
                    ?>
                </h1>

                <br>

                <a href="view_cart.php"> View Cart <i class="fa fa-shopping-cart" style="font-size:18px"></i> </a>
                </div>

            </div>

        </div>
    </div>
</body>
</html>