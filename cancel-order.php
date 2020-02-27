<?php

    session_start();
    if(!isset($_SESSION['user-id']))
        header("location:../login.php");
    elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 1)
        header("location:admin/index.php");
    
    require_once("database/database.inc.php");
    require_once("models/order.php");
    $order = new Order();
    $orderId= $_GET["orderId"];
    
    $order->cancelOrder($orderId);
    // header("Location: ./orders.php");
    header("Location: ./orders.php#order_d");
?>