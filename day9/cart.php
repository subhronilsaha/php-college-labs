<?php

$con = mysqli_connect('localhost', 'root', '', 'demo1');
session_start();

ini_set('display_errors', 1);

// Cart Session empty
if(!isset($_SESSION['cart'])) {
    $c = 0;
    echo $c;
}

// Product ID is set in request
if (isset($_REQUEST['id'])) {

    echo $_REQUEST['id'];

    // Cart Session empty
    if (!isset($_SESSION['cart'])) {
        $session = session_id();
        $_SESSION['cart'] = $session;
    }
    else {
        $session = $_SESSION['cart'];
    }

    echo $session;

    $query = "INSERT INTO order_session SET p_id='" . $_REQUEST['id'] . "', quantity='1', session='" . $session . "'";
    echo $query;
    mysqli_query($con, $query);
    header("location: index.php");
    
    echo $c;
}

if(isset($_REQUEST['increase'])) {
    $session = session_id();
    $query = "INSERT INTO order_session SET p_id='" . $_REQUEST['increase'] . "', quantity='1', session='" . $session . "'";
    echo $query;
    mysqli_query($con, $query);
    header("location: view_cart.php");
}

if(isset($_REQUEST['decrease'])) {
    $session = session_id();
    $query = "SELECT id FROM order_session WHERE p_id='" . $_REQUEST['decrease'] . "' and session='" . $session . "'";
    $result = mysqli_query($con, $query);

    if($result) {
        $fetch = mysqli_fetch_object($result);
        echo $fetch->id;
        $query1 = "DELETE FROM order_session WHERE id='" . $fetch->id . "'";
        mysqli_query($con, $query1);
    }
    
    header("location: view_cart.php");
}

if(isset($_REQUEST['delete'])) {
    $session = session_id();
    $query = "DELETE FROM order_session WHERE p_id='" . $_REQUEST['delete'] . "' AND session='" . $session . "'";
    mysqli_query($con, $query);
    header("location: view_cart.php");
}

?>