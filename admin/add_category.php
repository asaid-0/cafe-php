<?php

include "../database/config.php";

$dbServername = DB_HOST;
$dbUsername = DB_USER;
$dbPassword = DB_PWD;
$dbname = DB_NAME;

$id = $_POST["id"];
$name = $_POST["name"];




 try {
    $conn = new PDO('mysql:host='.$dbServername.';dbname='.$dbname, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    dd("Connection failed: " . $e->getMessage());
}
if(isset($_POST['submit'])){


    $query = "INSERT INTO categories ( id , name ) VALUES ( ? , ? );";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id,$name]);

    $result = $stmt->rowCount();

    if($result > 0){
       
         
    $query = "SELECT * FROM categories";
    $data = $conn->query($query);

    echo '<table width="70%" border="1"cellpadding="5" cellspacing="5" style="margin:0 200px;">
            <tr>
            <th>ID</th>
            <th>Name</th>           
            </tr>';   
    
      foreach($data as $row)
      {
          echo ' <tr>
                 <td>'.$row["id"].'</td>                 
                 <td>'.$row["name"].'</td>
                  
               </tr>';
      }
      echo '</tabl>';
        
    }else{
        echo'Data rejected!';
    }
        
	}else{
        ?>
        <script type="text/javascript">
            alert('Error while adding category data');
            window.location.href="add_category.html";
        </script>
        <?php
            
	}







?>