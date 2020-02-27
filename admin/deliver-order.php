<?php
session_start();
require_once("../database/database.inc.php");
require_once("../models/order.php");

$order = new Order();

if(!isset($_SESSION['user-id']))
    header("location:../login.php");
elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
    header("location:../home.php");

if(isset($_REQUEST['orderId']) && !empty($_REQUEST['orderId']))
{
        //set done
        $order->setDeliver($_REQUEST['orderId']);
       
}


header('location: orders.php');
die();








?>