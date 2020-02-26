<?php
session_start();
if(!isset($_SESSION['user-id']))
    header("location:../login.php");

require_once("../database/database.inc.php");
require_once('../models/checks.php');
$from = (isset($_REQUEST['from']) && !empty($_REQUEST['from'])) ? $_REQUEST['from'] : '1800-01-01';
$to = (isset($_REQUEST['to']) && !empty($_REQUEST['to'])) ? $_REQUEST['to'] : date("Y-m-d H:i:s");
$user_id = (isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])) ? $_REQUEST['user_id'] : null;

$checks = new Checks();
$allChecks = $checks->getChecks($user_id, $from, $to);


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
  <link rel="stylesheet" href="../assets/css/user-orders.css">
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
    <div class="add-container">
      <div class="main-title">Checks</div>
      <!-- start all hidden popup orders' products  -->
     


      <!-- end all hidden popup orders' products -->
      <form action="">
        <div class="search-group">
          <div>
          <label for="">User</label>
            <div class="select search-input">
              <select name="user_id" id="user_id">
                <option selected disabled>Select User</option>
                <?php
                  foreach($allChecks as $i){
                    echo  "<option value=\"{$i["user_id"]}\">{$i["user_name"]}</option>";
                  }
                ?>
               
              </select>
            </div>
          </div>

          <div>
            <label for="">Date from</label>
            <input type="date" class="search-input" name="from" placeholder="">
          </div>
          <div>
            <label for="">Date to</label>
            <input type="date" class="search-input" name="to" placeholder="Date to">
          </div>
          <div>
            <button type="submit" class="search-btn"><i class="fa fa-search search-icon"></i></button>
          </div>
        </div>
      </form>

      <div class="collapse-content">
        <?php
          foreach($allChecks as $i){
            $orders = $checks->getChecksOrders($i["user_id"], $from, $to);


            if(count($orders) > 0)

            {

              echo "<div>";
              foreach($orders as $order){
                $items = $checks->getOrderProducts($order["id"]);
                

                echo "    <div class=\"order\" id=\"order_{$order["id"]}\">\n";
                echo "        <div class=\"orderForm\">\n";
                echo "          <a href=\"#user_{$i["user_id"]}\" class=\"fa fa-window-close\"></a>\n";
                echo "          <h1>order {$order["id"]}</h1>\n";
                echo "          <div class=\"items\">\n";
                echo "            \n";

                foreach($items as $item){

                  echo "            <div class=\"item\">\n";
                echo "                <img src=\"../{$item["pic"]}\" alt=\"{$item["name"]}\" />\n";
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
                echo "        <a class=\"dimm-anchor\" href=\"#user_{$i["user_id"]}\"><div class=\"dimmed\"></div></a>\n";
                echo "    </div>";

              }

              echo "</div>";
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