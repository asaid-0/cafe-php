<?php

    $id = $_GET['num'];
    
    require_once("../models/user.php");
    require_once("../database/database.inc.php");

    $user = new User();

    $user->deletePhoto($id);
    $user->deleteUser($id);

    header("location:view-users.php");
    

?>