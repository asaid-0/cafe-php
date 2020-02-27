<?php
    require_once("database/database.inc.php");
    require_once('models/order.php');

    session_start();
    if(!isset($_SESSION['user-id']))
        header("location:login.php");
    elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 1)
        header("location:admin/index.php");

    if (isset($_POST['confirm'])) {
        $drinks = $_POST['drink_id'];
        $quantities = $_POST['drink_quantity'];
        $notes = $_POST['notes'];
        $room = $_POST['room'];
        $user_id = $_SESSION['user-id'];

        if (!empty($drinks) && !empty($quantities) && !empty($room)) {
            // $order = new Order($conn);
            $order = new Order();


            if ($order->create($user_id, $drinks, $quantities, $notes)) {
                $_SESSION['flash'] = 'ordered';
                header("Location: home.php");
            };
        }
    }
