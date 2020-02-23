<?php

require_once('models/order.php');

session_start();

$_SESSION["user_id"] = 1;

$serverName = "localhost";
$username = "admin";
$password = "Islam@123";
$dbName = "cafe";
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


if (isset($_POST['confirm'])) {
    $drinks = $_POST['drink_id'];
    $quantities = $_POST['drink_quantity'];
    $notes = $_POST['notes'];
    $room = $_POST['room'];
    $user_id = $_SESSION['user_id'];

    if (!empty($drinks) && !empty($quantities) && !empty($room)) {
        $order = new Order($conn);

        if ($order->create($user_id, $drinks, $quantities, $notes)) {
            $_SESSION['flash'] = 'ordered';
            header("Location: home.php");
        };
    }
}
