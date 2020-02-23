<?php

include "../database/config.php";
require_once('../models/checks.php');
$serverName = DB_HOST;
$username = DB_USER;
$password = DB_PWD;
$dbName = DB_NAME;
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$checks = new Checks($conn);
$allChecks = $checks->getChecks();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checks</title>
  <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  

  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/popup.css">
  <link rel="stylesheet" href="../assets/css/checks.css">




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
    <a href="#">
      <i class="fa fa-user"></i>
      <span>Admin Dashboard</span>
    </a>
  </nav>
  <section>
    <div class="add-container">
      <div class="main-title">Checks</div>
      <!-- start all hidden popup orders' products  -->
     


      <!-- end all hidden popup orders' products -->
      <form action="">
        <div class="search-group">
          <div>
          <label for="">User</label>
            <div class="select search-input">
              <select name="slct" id="slct">
                <option selected disabled>Select User</option>
                <option value="1">Ahmed Ahmed</option>
                <option value="2">Ahmed Ahmed</option>
                <option value="3">Ahmed Ahmed</option>
              </select>
            </div>
          </div>

          <div>
            <label for="">Date from</label>
            <input type="date" class="search-input" placeholder="">
          </div>
          <div>
            <label for="">Date to</label>
            <input type="date" class="search-input" placeholder="Date to">
          </div>
          <div>
            <button type="submit" class="search-btn"><i class="fa fa-search search-icon"></i></button>
          </div>
        </div>
      </form>

      <div class="collapse-content">
        <?php
          foreach($allChecks as $i){
            $orders = $checks->getChecksOrders($i["user_id"]);


            if(count($orders) > 0)
              foreach($orders as $order){
                $items = $checks->getOrderProducts($order["id"]);

                echo "    <div class=\"order\" id=\"order_{$order["id"]}\">\n";
                echo "        <div class=\"orderForm\">\n";
                echo "          <a href=\"#\" class=\"fa fa-window-close\"></a>\n";
                echo "          <h1>order {$order["id"]}</h1>\n";
                echo "          <div class=\"items\">\n";
                echo "            \n";

                foreach($items as $item){

                  echo "            <div class=\"item\">\n";
                echo "                <img src=\"{$item["pic"]}\" alt=\"{$item["name"]}\" />\n";
                echo "                <div class=\"item-details\">\n";
                echo "                    <h2>{$item["name"]}</h2>\n";
                echo "                    <p>Price: <em>{$item["price"]}</em>\n";
                echo "                    </p>\n";
                echo "                    <p>Quantity: <em>{$item["quantity"]}</em>\n";
                echo "                    </p>\n";
                echo "                    <p>Subtotal: <em>{$item["subtotal"]}</em>\n";
                echo "                    </p>\n";
                echo "                </div>\n";
                echo "            </div>\n";

                }
                
                echo "\n";
                echo "         </div>\n";
                echo "        </div>\n";
                echo "        <a class=\"dimm-anchor\" href=\"#\"><div class=\"dimmed\"></div></a>\n";
                echo "    </div>";

              }
            
            echo "<div class=\"collapse\" id=\"user_{$i["user_id"]}\">";
            echo "<a href=\"#user_{$i["user_id"]}\"><i class=\"fa fa-user\"></i> {$i["user_name"]}";
            echo "<span class=\"total\">total: {$i["total"]}</span>";
            echo '</a>';
            echo '<div class="container">';
            echo '<div class="content">';

            echo '<div class="orders">';
            if(count($orders) > 0){
              echo '<table class="orders-table">';
              echo '<tr>';
              echo '<th>Order Date</th>';
              echo '<th>Status</th>';
              echo '<th>Amount</th>';
              echo '<th>Action</th>';
              echo '</tr>';
              foreach($orders as $order){

               
                echo '<tr>';
                echo "<td>{$order["date"]}</td>";
                echo "<td>{$order["status"]}</td>";
                echo "<td>{$order["sub_total"]} EGP</td>";
                echo "<td><a href=\"#\"></a><a href=\"#order_{$order["id"]}\">View</a></td>";
                echo '</tr>';
               

              }
              echo '</table>';
              
            }else{
              echo '<h2>No Orders</h2>';

            }
            

            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        ?>


        
      </div>
    </div>
  </section>
</body>

</html>