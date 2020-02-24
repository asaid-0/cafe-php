<?php
include "database/config.php";

$serverName = DB_HOST;
$username = DB_USER;
$password = DB_PWD;
$dbName = DB_NAME;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Cafe - MyOrders</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user-orders.css">
    <link rel="stylesheet" href="assets/css/popup.css">
</head>

<body>

    <nav class="navbar">
        <ul class="menu-left">
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#" class="active">My Orders</a></li>
        </ul>

        <a href="#">
            <i class="fa fa-user"></i>
            <span>Islam Abdelhamid</span>
        </a>
    </nav>

    <section>
        <div class="container">
            <div class="content">
                <!-- start all hidden popup orders -->
                <div class="order" id="order_1">
                    <div class="orderForm">
                        <a href="#" class="fa fa-window-close"></a>
                        <h1>order 1</h1>
                        <div class="items">
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="dimm-anchor" href="#">
                        <div class="dimmed"></div>
                    </a>
                </div>

                <div class="order" id="order_2">
                    <div class="orderForm">
                        <a href="#" class="fa fa-window-close"></a>
                        <h1>order 2</h1>
                        <div class="items">
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="dimm-anchor" href="#">
                        <div class="dimmed"></div>
                    </a>
                </div>


                <div>
                  <div class="order" id="order_3">
                    <div class="orderForm">
                        <a href="#" class="fa fa-window-close"></a>
                        <h1>order 3</h1>
                        <div class="items">
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="assets/images/tea.jpg" alt="tea" />
                                <div class="item-details">
                                    <h2>Tea</h2>
                                    <p>Price: <em>$9</em>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- <a class="dimm-anchor" href="#"><div class="dimmed"></div></a> -->
                </div>
                <!-- end all hidden popup orders -->

                <!-- start hidden popup delete order successfully -->

                    <div class="order" id="order_d">
                        <div class="msg-container">
                            <h1>Order deleted Successfully</h1>
                        </div>
                        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>  
                    </div>
                <!-- end hidden popup delete order successfully -->
                
                <form action="./orders.php" method="post">
                    <div class="search-group">
                        <div>
                            <label for="">Date from</label>
                            <input type="date" name="date_from" class="search-input">
                        </div>
                        <div>
                            <label for="">Date to</label>
                            <input type="date" name="date_to" class="search-input">
                        </div>
                        <div>
                            <button type="submit" class="search-btn"><i class="fa fa-search search-icon"></i></button>
                        </div>
                    </div>
                </form>
                <div class="orders">
                    <table class="orders-table">
                        <tr>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        <?php

                        

                        $userId = 1;
                        $total = 0;
                        $orders_data;
                        try {
                            $conn = new PDO('mysql:host=' . $serverName . ';dbname=' . $dbName, $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }
                        if(!empty($_POST)){
                            $query_date_filter = "Select * from orders where user_id=$userId and date BETWEEN ? AND ?;";
                            $stmt_date_filter = $conn->prepare($query_date_filter);
                            $stmt_date_filter->execute([$_POST["date_from"],$_POST["date_to"]]);
                            $orders_data = $stmt_date_filter->fetchAll(); 
                        }else{
                            $query_list_orders = "Select * from orders where user_id=$userId;";
                            $orders_data = $conn->query($query_list_orders); 
                        }

                        foreach($orders_data as $order_details)
                        {
                            $orderId = $order_details["id"];
                            $query_order_products = "select id , price , quantity from products , orders_products where order_id = ? and product_id = id ";
                            $stmt_order_products = $conn->prepare($query_order_products);
                            $stmt_order_products->execute([$orderId]);
                            $data_order_products = $stmt_order_products->fetchAll();
                            $amount = 0;
                            foreach ($data_order_products as $product_details) {
                                $amount += $product_details["price"] * $product_details["quantity"];
                            }
                            echo '  <tr class = "data-row">
                                    <td>'.$order_details["date"].'</td>
                                    <td>'.$order_details["status"].'</td>
                                    <td>'.$amount.'</td>';
                            if ($order_details["status"] == "processing") {
                                echo'
                                <td><a href="cancel-order.php?orderId='.$orderId.'">Cancel</a>
                                    <a href="#order_1">View</a>
                                </td>
                                </tr>';
                            }else{
                                echo'
                                <td><a href="#order_1">View</a></td>
                                </tr>';
                            }
                            $total += $amount;
                        }
                        ?>
                    </table>
                </div>

                <div class="calculate">
                    <label for="">total</label>
                    <?php
                    echo ' <label for="">' . $total . ' EGP</label> '
                    ?>
                </div>
            </div>
            </div>
    </section>


</body>

</html>