<?php

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


    var_dump($_POST);

    // checkData($name, $email, $password, $room, $ext, $file_name); 

        updateUserData($id, $name, $email, $password, $room, $ext, $file_name, $file_tmp);
    /*function checkData($name, $email, $password, $room, $ext, $file_name) {
        if(empty($name) || empty($email) || empty($password) || empty($room) || empty($ext) || empty($file_name))
            header("location:update_form.php?num=$id&result=empty");
        else {
            updateUserData($id, $name, $email, $password, $room, $ext, $file_name, $file_tmp);
        }
    } */

    function updateUserData($id, $name, $email, $password, $room, $ext, $file_name, $file_tmp) {
       
        $extension = explode('.', $file_name);
        $file_ext = strtolower(end($extension));
        $extensions = array("jpeg", "jpg", "png");
        if(in_array($file_ext, $extensions) === false)
            header("location:update_form.php?num=$id&result=ext");
        else {
            $pic_name = "images/users/".$name.".".$file_ext;

            var_dump($pic_name);
            var_dump($ext, $room);

            var_dump($_FILES);
            if(move_uploaded_file($file_tmp, $pic_name))
                echo "User Registered Successfully and Image is uploaded.<br>";
            else 
                echo "Error uploading the image but user is registered.<br>";
        
            try {
                $dsn = 'mysql:dbname=cafe;host=localhost;port=3306;';
                $user = 'macrina';
                $pass = 'ROOT';
                $con = new \PDO($dsn, $user, $pass);
        
                var_dump($ext, $room);

                $query = "UPDATE users SET name=?, email=?, password=?, room=?, ext=?, pic=? WHERE id=?";
                $stmt = $con->prepare($query);
                $stmt->execute([$name, $email, $password, $room, $ext, $pic_name, $id]);
                header("location:user_table.php");
                $con = null;
            } catch (\Throwable $th) {
                echo "connection error"."<br>"."<br>";
            }
        }
    }

?>