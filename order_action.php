<?php

    session_start();
    if(!isset($_SESSION['user-id']))
        header("location:login.php");
    elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 1)
        header("location:admin/index.php");
        
    $dbServername = "localhost";
    $dbUsername = "macrina";
    $dbPassword = "ROOT";
    $dbname = "cafe";

    


    try {
        $conn = new PDO('mysql:host='.$dbServername.';dbname='.$dbname, $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
        dd("Connection failed: " . $e->getMessage());
    }

    if($conn){
        
            
        $query = "SELECT o.date , o.status , o.id , u.name , u.room , u.ext , (quantity * price) AS Amount
                FROM orders o , users u , products , orders_products
                WHERE o.user_id = u.id AND products.id = orders_products.product_id";
        $data = $conn->query($query);
        



        echo '<table width="70%" border="1"cellpadding="5" cellspacing="5" style="margin:0 200px;">
                <tr>
                <th>Date</th>
                <th>Name</th>  
                <th>Room</th>
                <th>Ext</th> 
                <th>Amount</th>
                <th>Actions</th>          
                </tr>'; 
        
        foreach($data as $row)
        {
            $mystatus = "";
            
            if($row["status"] == "Done"){
                $mystatus = "No Action";
            }elseif($row["status"] == "Processing"){
                $mystatus = "out-for-delivery";
            }elseif($row["status"] == "out-for-delivery"){
                $mystatus = "Done";
            }

            echo ' <tr>
                    <td>'.$row["date"].'</td>                 
                    <td>'.$row["name"].'</td>
                    <td>'.$row["room"].'</td>
                    <td>'.$row["ext"].'</td>
                    <td>'.$row["Amount"].'</td>
                    
                    <td><a href="order_action.php?del='. $row["id"].'">'. $mystatus .'</a></td>
                </tr>';
        }
        echo '</tabl>';

        if(isset($_GET['del'])){

            $ID = $_GET['del'];
            if ($row["status"] === "Processing"){
            $update = "UPDATE orders SET  status = 'Out-For-Delivery' WHERE id = ".$ID;
            $data2 = $conn->query($update);
        
            } elseif ($row["status"] === "Out-For-Delivery"){
                $update = "UPDATE orders SET  status = 'Done' WHERE id = ".$ID;
                $data2 = $conn->query($update);
        
            }
                // elseif($row["status"] === "Done"){
                //     $update = "UPDATE orders SET  status = 'No_Action' WHERE id = ".$ID;
                //     $data2 = $conn->query($update);
            
                //     }
            
        }
    } else{
    
        //  <script type="text/javascript">
        //     alert('Error while Fetching  data');
        //      window.location.href="cafe-php/home.html";
        // </script> 
    
            
    }
   
?>