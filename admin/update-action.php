<?php
    session_start();

    if(!isset($_SESSION['user-id']))
        header("location:../login.php");
    elseif(isset($_SESSION['user-id']) && $_SESSION['admin'] == 0)
        header("location:../home.php");
    
    
    require_once("../database/database.inc.php");
    require_once("../models/user.php");

    $user = new User();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_REQUEST['id'];
        $name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$ext = $_POST['ext'];
		$room = $_POST['room'];

        var_dump($_POST);

		if($name == "")
			$errors["name"] = "Name field is required.<br>";
		if($email != "") {
			$pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
			$emailval1 = preg_match($pattern, $email);
			$emailval2 = filter_var($email, FILTER_VALIDATE_EMAIL);
			if($emailval2 == false || $emailval1 == false) 
				$errors[] = "Wrong Email Format.<br>";
		}
		else {
			$errors["email"] = "Email field is required.<br>";
		}

		if($password != "") {
			$passwordval1 = preg_match("/^([a-z0-9]|_){8}$/ix", $password);
			if($passwordval1 == false) 
				$errors["password"] = "Unacceptable password format, password should contain 
				exactly 8 lowercase letters, numbers and/or _.<br>";
		}
		else {
			$errors["password"] = "Password field is required.<br>";
		}

		if($room == "") 
			$errors["room"] = "Please enter the room number.<br>";

	/*******************Data is validated and ready to be updated*******************/

		if(!empty($errors)) {
            error_log(print_r($errors, TRUE)); 
            $_SESSION['errors'] = $errors;
            header("location:update-user.php?num=$user_id"); 
        }
        else {
            $user->updateUserData($id, $name, $email, $password, $room, $ext);//, $file_name, $file_tmp);
            unset($_SESSION['errors']);
            header("location:../admin/view-users.php");
        }
    }

?>