<?php

    $errors;
    
    if(isset($_POST)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $ext = $_POST['ext'];
        $room = $_POST['room'];
        $file_info = $_FILES['photo'];
        $file_name = $file_info['name'];
        $file_size = $file_info['size'];
        $file_tmp = $file_info['tmp_name'];
        $file_type = $file_info['type'];

        if($name == "")
            $errors[] = "Name field is required.<br>";
        
        
        
        if($email != "") {
            $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
            $emailval1 = preg_match($pattern, $email);
            $emailval2 = filter_var($email, FILTER_VALIDATE_EMAIL);
            if($emailval2 == false || $emailval1 == false) 
                $errors[] = "Wrong Email Format.<br>";
            
        }
        else {
            $errors[] = "Email field is required.<br>";
        }

        if($password != "") {
            $passwordval1 = preg_match("/^([a-z0-9]|_){8}$/ix", $password);
            if($passwordval1 == false) 
                $errors[] = "Unacceptable password format, password should contain 
                exactly 8 lowercase letters, numbers and/or _.<br>";
        }
        else {
            $errors[] = "Password field is required.<br>";
        }

        if($confirm != "") {
            if($confirm != $password)
                $errors[] = "Confirm Password field should match Password field.<br>";
        }
        else {
            $errors[] = "Confirm Password field is required.<br>";
        }

        if($room == "") 
            $errors[] = "Please choose a room.<br>";

        
        
        if(!empty($file_name)) {
            $ext = explode('.', $file_name);
            $file_ext = strtolower(end($ext));
            $extensions = array("jpeg", "jpg", "png");
        
            if(in_array($file_ext, $extensions) === false){
                $errors[] = "extension not allowed, please choose a JPEG, JPG or PNG file.";
            } 
        }
        else {
            $errors[] = "No Photos uploaded.<br>";
        }

        /*******************Data is validated and ready for insertion*******************/

        if(empty($errors) == true){

            if(move_uploaded_file($file_tmp, "imgs/$file_name"))
                echo "User Registered Successfully and Image is uploaded.<br>";
            else 
                echo "Error uploading the image but user is registered.<br>";
            
            
            insertUser($name, $email, $password, $room, "imgs/".$file_name);
            echo "User successfully inserted."."<br>";
        
            echo"<br>Do you want to add anothor name or print the other names?<br>";
            echo"<a href='http://localhost/PHPLabs/Lab4/form.html'>Yes</a>";
            echo"	";
            echo"<a href='http://localhost/PHPLabs/Lab4/user_table.php'>Print</a>";

            
        }else{
            foreach($errors as $error) 
                echo $error;
            
            echo "<br>Please review your information as it is not complete.<br>";
            echo"<a href='http://localhost/PHPLabs/Lab4/form.html'>Go back.</a>";
        
        }
    }
    
    function insertUser($name, $email, $password, $room, $filename) {
        try {
            //code...
            $dsn = 'mysql:dbname=PHPDB_users;host=localhost;port=3306;';
            $user = 'macrina';
            $pass = 'ROOT';
    
            $con = new \PDO($dsn, $user, $pass);
            
            $query = 'INSERT INTO users (name, email, password, room, path_to_file) VALUES (?, ?, ?, ?, ?)';
            $stmt = $con->prepare($query);
            $stmt->execute([$name, $email, $password, $room, "imgs/".$file_name]);
            $result = $stmt->rowCount();
            $con = null;
        } catch (\Throwable $th) {
            echo "connection error"."<br>"."<br>";
        }
    }
?>