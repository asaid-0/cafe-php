<?php


    require_once("../database/database.inc.php");
    require_once("../models/order.php");
    $orders = new Order();

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Cafe - MyOrders</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/user-orders.css">
    <link rel="stylesheet" href="../assets/css/popup.css">
</head>

<body>

<nav class="navbar">
        <ul class="menu-left">
            <li><a href="index.php" class="logo">OS Coffee</a></li>
            <li><a href="view-products.php">Products</a></li>
            <li><a href="view-users.php">Users</a></li>
            <li><a href="#" class="active">Orders</a></li>
            <li><a href="checks.php">Checks</a></li>
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
            <div class="content">
                <!-- start all hidden popup orders -->
                
                <!-- end all hidden popup orders -->

                <!-- start hidden popup delete order successfully -->

                    <div class="order" id="order_d">
                        <div class="msg-container">
                            <h1>Order deleted Successfully</h1>
                        </div>
                        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>  
                    </div>
                <!-- end hidden popup delete order successfully -->
                
                <div class="orders">
                    <table class="orders-table">
                        <tr>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Room</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        // $userId = 2;
                        $total = 0;
                        $orders_data = $orders->adminGetOrders();

                        foreach($orders_data as $order_details)
                        {
                            $amount = 0;
                            $orderId = $order_details["id"];
                            $order_products_data = $orders->getOrderProducts($orderId);

                                echo "              <div class=\"order\" id=\"order_$orderId\">\n";
                                echo "                    <div class=\"orderForm\">\n";
                                echo "                        <a href=\"#\" class=\"fa fa-window-close\"></a>\n";
                                echo "                        <h1>order $orderId</h1>\n";
                                echo "                        <div class=\"items\">\n";


                            foreach($order_products_data as $order_item){
                                
                                echo "                            <div class=\"item\">\n";
                                echo "                                <img src=\"assets/images/tea.jpg\" alt=\"tea\" />\n";
                                echo "                                <div class=\"item-details\">\n";
                                echo "                                    <h2>{$order_item['name']}</h2>\n";
                                echo "                                    <p>Price: <em>{$order_item['price']}</em>\n";
                                echo "                                    </p>\n";
                                echo "                                </div>\n";
                                echo "                            </div>\n";

                            }

                            echo "                        </div>\n";
                            echo "                    </div>\n";
                            echo "                    <a class=\"dimm-anchor\" href=\"#\">\n";
                            echo "                        <div class=\"dimmed\"></div>\n";
                            echo "                    </a>\n";
                            echo "                </div>";



                            foreach ($order_products_data as $product_details) {
                                $amount += $product_details["price"] * $product_details["quantity"];
                            }
                            echo '  <tr class = "data-row">
                                    <td>'.$order_details["date"].'</td>
                                    <td>'.$order_details["status"].'</td>
                                    <td>'.$order_details["name"].'</td>
                                    <td>'.$order_details["room"].'</td>
                                    <td>'.$amount.'</td>';
                            if ($order_details["status"] == "processing") {
                                echo"
                                <td><a href=\"deliver-order.php?orderId=$orderId\">Deliver</a>
                                    <a href=\"#order_$orderId\">View</a>
                                </td>
                                </tr>";
                            }elseif($order_details["status"] == "out-for-delivery"){
                                echo"
                                <td><a href=\"done-order.php?orderId=$orderId\">Done</a>
                                    <a href=\"#order_$orderId\">View</a>
                                </td>
                                </tr>";
                            }else{
                                echo"
                                <td><a href=\"#order_$orderId\">View</a></td>
                                </tr>";
                            }
                            $total += $amount;
                        }
                        ?>
                    </table>
                </div>

            </div>
            </div>
    </section>


</body>

</html>