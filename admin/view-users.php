<?php
    session_start();
    if(!isset($_SESSION['user-id']))
        header("location:../login.php");
    elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
        header("location:../home.php");
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin All users</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin-all-products.css">


</head>
<body>
    <nav class="navbar">
        <ul class="menu-left">
            <li><a href="index.php" class="logo">OS Coffee</a></li>
            <li><a href="view-products.php">Products</a></li>
            <li><a href="#" class="active">Users</a></li>
            <li><a href="#">Manual Order</a></li>
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
            <header>
                <h2>All Users</h2>
                <a href="add-user.php">Add user</a>
            </header>
            <div class="users">
                <table class="users-table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Ext.</th>
                        <th>Room</th>
                        <th colspan="2">Options</th>
                    </tr>
                    <?php
                        require_once("../models/user.php");
                        include "../database/config.php";

                        $dbServername = DB_HOST;
                        $dbUsername = DB_USER;
                        $dbPassword = DB_PWD;
                        $dbname = DB_NAME;

                        $dsn = 'mysql:host='.$dbServername.';dbname='.$dbname;
                        try {
                            $con = new \PDO($dsn, DB_USER, DB_PWD);

                            $user = new User($con);
                            $row = $user->selectAllUsers();

                            for ($i = 0; $i < count($row); $i++) {
                                if($row[$i]['isAdmin'] == 0) {
                                    $id = $row[$i]['id'];
                                    echo "<tr><td>".$row[$i]['name']."</td> <td>".$row[$i]['email']."</td> <td> <img src=".$row[$i]['pic']." alt='photo'/></td> <td>".$row[$i]['ext']."</td> <td>".$row[$i]['room']."</td>";
                                    echo"<td><a href ='update-form.php?num=$id'>Update</a></td>";
                                    echo"<td><a href ='delete_action.php?num=$id'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            }
                        } catch(\Throwable $th) {
                            echo "Connection Error"."<br>"."<br>";
                        }

                        // $con = null;*/
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>