<?php
session_start();
if(!isset($_SESSION['user-id']))
    header("location:../login.php");
elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
    header("location:../home.php");

require_once("../database/database.inc.php");
require_once('../models/order.php');



if (isset($_POST['confirm'])) {
    $drinks = $_POST['drink_id'];
    $quantities = $_POST['drink_quantity'];
    $notes = $_POST['notes'];
    $room = $_POST['room'];
    $user_id = $_POST['user'];

    if (!empty($drinks) && !empty($quantities) && !empty($room)) {
        $order = new Order();

        if ($order->create($user_id, $drinks, $quantities, $notes)) {
            $_SESSION['flash'] = 'ordered';
            header("Location: index.php");
        };
    }
}
