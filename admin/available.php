<?php
session_start();
require_once("../database/database.inc.php");
require_once("../models/products.php");

$product = new Products();

if(!isset($_SESSION['user-id']))
    header("location:../login.php");
elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
    header("location:../home.php");

if(isset($_REQUEST['id']) && isset($_REQUEST['available']))
{
    if($_REQUEST['available']){
        //set unavailable
        $product->setUnavailable($_REQUEST['id']);
    }else{
        //set available
        $product->setAvailable($_REQUEST['id']);
    }
    
}


header('location: view-products.php');
die();








?>