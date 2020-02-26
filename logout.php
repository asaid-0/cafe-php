<?php
session_start();
    if(isset($_SESSION['user-id'])){
        unset($_SESSION);
        session_destroy();
        header("location:login.php");
    }
    
?>