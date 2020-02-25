<?php
session_start();
    if(isset($_SESSION['id'])){
        unset($_SESSION);
        session_destroy();
        header("location:login.php");
    }
    
?>