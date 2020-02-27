<?php
    session_start();
    if(!isset($_SESSION['user-id']))
        header("location:../login.php");
    elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
        header("location:../home.php");

    require_once("../models/user.php");
    require_once("../database/database.inc.php");

    $id = $_GET['num'];
    $user = new User();
    $row = $user->selectUser($id);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/add.css">
        <link rel="stylesheet" href="../assets/css/style.css">
   


</head>
<body>
<nav class="navbar">
        <ul class="menu-left">
            <li><a href="index.php" class="logo">OS Coffee</a></li>
            <li><a href="view-products.php">Products</a></li>
            <li><a href="view-users.php">Users</a></li>
            <li><a href="orders.php">Orders</a></li>
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
        <div class="add-container">
            <div class="main-title">Update User</div>
            <div id='form' class='_form'>
                <form action='update-action.php' method='POST' name='addUser'>
              
                    <input type='hidden' name='id' value="<?php echo $row['id']?>">
                  <fieldset>
                    <legend>NAME</legend>
                    <input type='text' name='name' value="<?php echo $row['name'];?>"/>
                    <span class="error"><?php echo !empty($_SESSION['errors']["name"]) ? $_SESSION['errors']["name"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>EMAIL</legend>
                    <input type='text' name='email' value="<?php echo $row['email']?>"/>
                    <span class="error"><?php echo !empty($_SESSION['errors']["email"]) ? $_SESSION['errors']["email"] : ""; ?></span>
                  </fieldset>
              
                  <fieldset>
                    <legend>PASSWORD</legend>
                    <input type='text' name='password' value="<?php echo $row['password']?>"/>
                    <span class="error"><?php echo !empty($_SESSION['errors']["password"]) ? $_SESSION['errors']["password"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>ROOM NO.</legend>
                    <input type='text' name='room' value="<?php echo $row['room']?>"/>
                    <span class="error"><?php echo !empty($_SESSION['errors']["room"]) ? $_SESSION['errors']["room"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>EXT.</legend>
                    <input type='text' name='ext' value="<?php echo $row['ext']?>"/>
                    <span class="error"><?php echo !empty($_SESSION['errors']["ext"]) ? $_SESSION['errors']["ext"] : ""; ?></span>
                  </fieldset>
                  
                  <input type='submit' name='submit' value='Update' />
                </form>
              </div>
        </div>
    </section>
</body>
</html>