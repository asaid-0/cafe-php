<?php
session_start();
if (!isset($_SESSION['user-id']))
    header("location:../login.php");
elseif (isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
    header("location:../home.php");

require_once("../database/database.inc.php");
require_once("../models/products.php");
$products = new Products();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin All products</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin-all-products.css">


</head>

<body>
    <nav class="navbar">
        <ul class="menu-left">
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#" class="active">Products</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Manual Order</a></li>
            <li><a href="#">Checks</a></li>
        </ul>
        <span>
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Admin Dashboard</span>
            </a>


            <a href="../logout.php">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
            </a>


        </span>
    </nav>
    <section>
        <div class="container">
            <header>
                <h2>All Products</h2>
                <a href="">Add product</a>
            </header>
            <div class="items">



                <?php
                foreach ($products->getProducts() as $p) {
                    $statusBtn = $p['isAvailable'] ? "Unavailable" : "Available";
                    echo "<div class=\"item\" id=\"{$p['id']}\">\n";
                    echo "                        <img src=\"../{$p['pic']}\" alt=\"{$p['name']}\" />\n";
                    echo "                        <div class=\"item-details\">\n";
                    echo "                            <h2 class=\"item-name\">{$p['name']}</h2>\n";
                    echo "                            <p>Price: <em class=\"item-price\">{$p['price']} EGP</em>\n";
                    echo "                            </p>\n";
                    echo "                        </div>\n";
                    echo "                        <div class=\"action\">\n";
                    echo "                            <a href=\"available.php?available={$p['isAvailable']}&id={$p['id']}\"><button class=\"add-to-cart\" type=\"button\">$statusBtn</button></a>\n";
                    echo "                            <a href=\"edit-product.php?id={$p['id']}\"><button class=\"add-to-cart\" type=\"button\">Edit</button></a>\n";
                    echo "                            <a href=\"delete-product.php?id={$p['id']}\"><button class=\"add-to-cart\" type=\"button\">Delete</button></a>\n";
                    echo "                        </div>";
                    echo "                    </div>";
                }
                ?>



            </div>
        </div>
    </section>
</body>

</html>