<?php
    require_once("../models/user.php");
    include("../database/config.php");

    $dbServername = DB_HOST;
    $dbUsername = DB_USER;
    $dbPassword = DB_PWD;
    $dbname = DB_NAME;

    $dsn = 'mysql:host='.$dbServername.';dbname='.$dbname;
    $con = new \PDO($dsn, $dbUsername, $dbPassword);

    $id = $_GET['num'];
    $user = new User($con);
    $row = $user->selectUser($id);
        
?>

<form action="update-action.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo $row["id"]?>">
	<input type="text" name="name" id="name" value="<?php echo $row["name"]?>">
    <br><br>
    <input type="text" name="email" id="email" value="<?php echo $row["email"]?>">
    <br><br>
    <input type="text" name="password" id="password" value="<?php echo $row["password"]?>">
    <br><br>
    <input type="text" name="ext" id="ext" value="<?php echo $row["ext"]?>">
    <br><br>
    <input type="text" name="room" id="room" value="<?php echo $row["room"]?>">
    <br><br>
    <input type="file" name="photo" id="photo">
    <br><br>
    <input type="submit" value="Update">
</form>