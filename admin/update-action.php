<?php
    session_start();

    if(!isset($_SESSION['user-id']))
        header("location:../login.php");
    elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
        header("location:../home.php");
    
    
    require_once("../database/database.inc.php");
    require_once("../models/user.php");

    $user = new User();

    $id = $_POST['id'];    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $room = $_POST['room'];
    $ext = $_POST['ext'];

    $user->updateUserData($id, $name, $email, $password, $room, $ext);//, $file_name, $file_tmp);
    header("location:../admin/view-users.php");

?>