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
      <!-- start all hidden popup orders -->
      <div class="order" id="order_1">
        <div class="orderForm">
          <a href="#" class="fa fa-window-close"></a>
          <h1>order 1</h1>
          <div class="items">
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>
      </div>

      <div class="order" id="order_2">
        <div class="orderForm">
          <a href="#" class="fa fa-window-close"></a>
          <h1>order 2</h1>
          <div class="items">
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>
      </div>


      <div class="order" id="order_3">
        <div class="orderForm">
          <a href="#" class="fa fa-window-close"></a>
          <h1>order 3</h1>
          <div class="items">
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>
      </div>

      <!-- end all hidden popup orders -->
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