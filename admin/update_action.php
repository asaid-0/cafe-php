<?php

    include "../database/config.php";

    /*$dbServername = DB_HOST;
    $dbUsername = DB_USER;
    $dbPassword = DB_PWD;
    $dbname = DB_NAME;*/

    $id;
    if(empty($_POST['id']))
        $id = $_GET['num'];
    else
        $id = $_POST['id'];
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $room = $_POST['room'];
    $ext = $_POST['ext'];
    $file_info = $_FILES['photo'];
    $file_name = $file_info['name'];
    $file_size = $file_info['size'];
    $file_tmp = $file_info['tmp_name'];
    $file_type = $file_info['type'];

    updateUserData($id, $name, $email, $password, $room, $ext, $file_name, $file_tmp);


    function updateUserData($id, $name, $email, $password, $room, $ext, $file_name, $file_tmp) {
        $pic_name = uploadPhoto($name, $file_tmp, $file_name);
        $con;
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
        try {
            
            var_dump($con);
            $con = new \PDO($dsn, DB_USER, DB_PWD);
    
            $query = "UPDATE users SET name=?, email=?, password=?, room=?, ext=?, pic=? WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->execute([$name, $email, $password, $room, $ext, $pic_name, $id]);
           // header("location:../admin/users.php");
            $con = null;
        } catch (\Throwable $th) {
            echo "connection error"."<br>"."<br>";
        }
    }

    function uploadPhoto($name, $file_tmp, $file_name) {
        $extension = explode('.', $file_name);
        $file_ext = strtolower(end($extension));
        $extensions = array("jpeg", "jpg", "png");
        $pic_name;
        if(in_array($file_ext, $extensions) === false)
            header("location:update_form.php?num=$id&result=ext");
        else {
            $pic_name = "../images/".$name.".".$file_ext;

            if(move_uploaded_file($file_tmp, $pic_name))
                echo "User Registered Successfully and Image is uploaded.<br>";
            else 
                echo "Error uploading the image but user is registered.<br>";
        }

        return $pic_name;
    }

?>