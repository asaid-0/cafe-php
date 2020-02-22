<?php
include "database/config.php";

$dbServername = DB_HOST;
$dbUsername = DB_USER;
$dbPassword = DB_PWD;
$dbname = DB_NAME;


 try {
    $conn = new PDO('mysql:host='.$dbServername.';dbname='.$dbname, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM products";
    $data = $conn->query($query);

    echo '<table width="70%" border="1"cellpadding="5" cellspacing="5">
            <tr>
            <th>ID</th>
            <th>Category ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Picture</th>
            </tr>';   
    
      foreach($data as $row)
      {
          echo ' <tr>
                 <td>'.$row["id"].'</td>
                 <td>'.$row["cat_id"].'</td>
                 <td>'.$row["name"].'</td>
                 <td>'.$row["price"].'</td>
                 <td>'.$row["pic"].'</td>
          </tr>';
      }
      echo '</tabl>';




}


catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    dd("Connection failed: " . $e->getMessage());
}








?>