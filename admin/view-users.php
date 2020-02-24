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
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#" class="active">Users</a></li>
            <li><a href="#">Manual Order</a></li>
            <li><a href="#">Checks</a></li>
        </ul>
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Admin Dashboard</span>
        </a>
    </nav>
    <section>
        <div class="container">
            <header>
                <h2>All Users</h2>
                <a href="">Add user</a>
            </header>
            <div class="orders">
                <table class="orders-table">
                    <tr>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Image</th>
                        <th>Ext.</th>
                        <th>Action</th>
                        <th colspan="2">Options</th>
                    </tr>
                    <?php

                        include "../database/config.php";

                        $dbServername = DB_HOST;
                        $dbUsername = DB_USER;
                        $dbPassword = DB_PWD;
                        $dbname = DB_NAME;

                        $dsn = 'mysql:host='.$dbServername.';dbname='.$dbname;
                        try {
                            $con = new \PDO($dsn, $dbUsername, $dbPassword);

                            $query = "SELECT * FROM users";
                            $stmt = $con->prepare($query);
                            $stmt->execute();

                            while ($row = $stmt->fetch()) {
                                $id = $row['id'];
                                echo "<tr><td>".$row['name']."</td> <td>".$row['email']."</td> <td> <img src=".$row['pic']." alt='photo'/></td> <td>".$row['ext']."</td> <td>".$row['room']."</td>";
                                echo"<td><a href ='update-form.php?num=$id'>Update</a></td>";
                                echo"<td><a href ='delete_action.php?num=$id'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } catch(\Throwable $th) {
                            echo "Connection Error"."<br>"."<br>";
                        }

                        $con = null;
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>