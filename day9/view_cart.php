<?php
    $con = mysqli_connect('localhost', 'root', '', 'demo1');
    @session_start(); // Start session for user
    $session = session_id();

    ini_set('display_errors', 1);

    // FETCH Category DATA
    

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
                <li><a href="login.php"> Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
        <div class="content">
            
            <div class="left-side"> </div>

            <div class="middle"> 
                <h1>Your Cart</h1> 

                <br>
                
                <form method="post" action="payment.php">
                    <table>
                        <tr>
                            <td> <b> Index  </b> </td>
                            <td> <b> ID  </b> </td>
                            <td> <b> Photo        </b> </td>
                            <td> <b> Name         </b> </td>
                            <!-- <td> <b> Category   </b> </td> -->
                            <td> <b> Price   </b> </td>
                            <td> <b> Quantity   </b> </td>
                            <td> <b> Subtotal   </b> </td>
                            <td> <b> Actions   </b> </td>

                        </tr>
                        
                        <?php
                            
                            $total = 0;
                            $index = 1;
                            $_SESSION['cart'] = session_id();
                            $query = "SELECT DISTINCT p_id FROM order_session WHERE session='" . $_SESSION['cart'] . "'";
                            $result = mysqli_query($con, $query);

                            while($fetch = mysqli_fetch_object($result)) {
                                $query2 = "SELECT id, c_id, name, price, image_name FROM items WHERE id='" . $fetch->p_id . "'";
                                $result2 = mysqli_query($con, $query2);
                                $fetch2 = mysqli_fetch_object($result2);
                        ?>
                        <tr>
                            <td> <?php echo $index; ?> </td>
                            <td> <?php echo $fetch2->id; ?> </td>
                            <td> 
                                <img 
                                src="admin-panel/item_modules/item_images/<?php echo $fetch2->image_name; ?>" 
                                width=50 
                                height=50>
                            </td>
                            <td> <?php echo $fetch2->name; ?> </td>
                            <td> ₹ <?php echo $fetch2->price; ?> </td>
                            <td>
                            <?php 
                                $query3 = "select distinct id from order_session where p_id = '" . $fetch2->id . "'";
                                $result3 = mysqli_query($con, $query3);
                                $fetch3 = mysqli_num_rows($result3);
                                echo $fetch3;
                            ?>
                            </td>
                            <td>₹ 
                                <?php 
                                    $subtotal = $fetch2->price * $fetch3; 
                                    $total = $total + $subtotal;
                                    echo $subtotal;
                                ?> 
                            </td>

                            <td> <a href="cart.php?increase=<?php echo $fetch2->id; ?>"> Increase </a></td>
                            <td> <a href="cart.php?decrease=<?php echo $fetch2->id; ?>"> Decrease </a></td>
                            <td> <a href="cart.php?delete=<?php echo $fetch2->id; ?>"> Delete </a></td>

                        </tr>
                        <?php 

                            $index+=1;

                            }
                            
                        ?>
                    </table>
                </form>

                <br>

                <p> Total = ₹ <?php echo $total; ?></p>

                <div class="navbar">
                    <li>
                        <a href="#chekout"> Proceed to Checkout </a>
                    </li>
                </div>

                <br>

                <br>

                <h3 id="chekout"> Checkout </h3>

                <form method="post" action="payment_gateway/payment.php">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td> <input type="text" name="firstname" value=""> </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value=""></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" value=""></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="productinfo" value="test"/>
                        <tr>
                        <tr>
                            <input type="hidden" name="amount" value="<?php echo $total; ?>"/>
                        <tr>
                        <tr>
                            <input type="hidden" name="surl" value="http://localhost:8080/day9/payment_gateway/success.php"/>
                        <tr>
                        <tr>
                            <input type="hidden" name="furl" value="http://localhost:8080/day9/payment_gateway/failure.php"/>
                        <tr>
                            <td> 
                                <input type="submit" name="submit" value="Proceed to Payment">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>

            <div class="right-side">
            </div>

        </div>
    </div>
</body>
</html>