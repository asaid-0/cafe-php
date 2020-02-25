<?php
include "database/config.php"; 

$dbServername = DB_HOST;
$dbUsername = DB_USER;
$dbPassword = DB_PWD;
$dbname = DB_NAME;

echo $_GET["orderId"];
$orderId= $_GET["orderId"];
try {
    $conn = new PDO('mysql:host='.$dbServername.';dbname='.$dbname, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
$query_delete_order = "Delete from orders_products where order_id=$orderId;";
$conn->exec($query_delete_order);
$query_delete_order = "Delete from orders where id=$orderId;";
$conn->exec($query_delete_order);

// header("Location: ./orders.php");
header("Location: ./orders.php#order_d");
?>