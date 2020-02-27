<?php
session_start();

if(!isset($_SESSION['user-id']))
    header("location:../login.php");
elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
    header("location:../home.php");

require_once("../database/database.inc.php");
require_once("../models/products.php");

$product = new Products();


if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
    $product->deleteProduct($_REQUEST['id']);


header('location: view-products.php');
die();

?>