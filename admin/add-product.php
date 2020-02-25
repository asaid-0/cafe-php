<?php
session_start();

if(!isset($_SESSION['id']))
    header("location:../login.php");

include "../database/config.php";

$dbServername = DB_HOST;
$dbUsername = DB_USER;
$dbPassword = DB_PWD;
$dbname = DB_NAME;

$id = $_POST["id"];
$category_id = $_POST["cat_id"];
$name = $_POST["name"];
$price = $_POST["price"];
$pic = $_FILES['pic']['name']; 
$target_path = "F:\\ITI\\"; 
$target_path = $target_path.basename( $pic);   
  
if(move_uploaded_file($_FILES['pic']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}




try {
    $conn = new PDO('mysql:host='.$dbServername.';dbname='.$dbname, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    
}


if(isset($_POST['submit'])){


    $query = "INSERT INTO products ( id , cat_id , name , price, pic ) VALUES ( ? , ? , ? , ? , ? );";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id,$category_id,$name,$price,$target_path]);

    $result = $stmt->rowCount();

    if($result > 0){
        ?>
        <script type="text/javascript">
            alert('Successfully Added');
            window.location.href="view_products.php";
        </script>
        <?php 

    //    echo 'Data added successfully';
        
    }else{
        echo'Data rejected!';
    }
        
	}else{
        ?>
        <script type="text/javascript">
            alert('Error while adding data and iamge');
            window.location.href="poducts.html";
        </script>
        <?php
            
	}

?>