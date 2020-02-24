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
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#" class="active">Products</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Manual Order</a></li>
            <li><a href="#">Checks</a></li>
        </ul>
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Admin Dashboard</span>
        </a>
    </nav>
    <section>
        <div class="add-container">
            <div class="main-title">Add User</div>
            <div id='form' class='_form'>
                <form action='add-user.php' method='POST' enctype="multipart/form-data" name='addUser'>
              
                  <fieldset>
                    <legend>NAME</legend>
                    <input type='text' name='name' placeholder='Name' />
                  </fieldset>

                  <fieldset>
                    <legend>EMAIL</legend>
                    <input type='text' name='email' placeholder='Email' />
                  </fieldset>
              
                  <fieldset>
                    <legend>PASSWORD</legend>
                    <input type='password' name='password' placeholder='password' />
                  </fieldset>

                  <fieldset>
                    <legend>CONFIRM PASSWORD</legend>
                    <input type='password' name='confirm_password' placeholder='confirm password' />
                  </fieldset>

                  <fieldset>
                    <legend>ROOM NO.</legend>
                    <input type='text' name='room' placeholder='Room No.' />
                  </fieldset>

                  <fieldset>
                    <legend>EXT.</legend>
                    <input type='text' name='ext' placeholder='Ext.' />
                  </fieldset>

                  <fieldset>
                    <legend>PROFILE PICTURE</legend>
                    <label for="file" class="file-upload">
                      <span class="fa fa-cloud-upload"><span> Upload
                    </label>
                    <input type='file' name='file' id="file" />
                  </fieldset>
                  
                  <input type='submit' name='submit' value='Add' />
                </form>
              </div>
        </div>
    </section>
</body>
</html>

<?php

  include("user-functions.php");
	// include "../database/config.php";

	if(isset($_POST)) {
		// $file_ext;	#to be used in uploading image to folder function
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];
        $ext = $_POST['ext'];
        $room = $_POST['room'];
        $file_info = $_FILES['file'];
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
            $errors[] = "Please enter the room number.<br>";

        if(!empty($file_name)) {
            $extens = explode('.', $file_name);
            $file_ext = strtolower(end($extens));
            $extensions = array("jpeg", "jpg", "png");
        
            if(in_array($file_ext, $extensions) === false){
                $errors[] = "extension not allowed, please choose a JPEG, JPG or PNG file.";
            } 
        }
        else {
            $errors[] = "No Photos uploaded.<br>";
		}

	/*******************Data is validated and ready for insertion*******************/

		if(empty($errors)) {
			$pic_name = uploadPhoto($name, $file_tmp, $file_ext);
			insertUser($name, $email, $password, $room, $ext, $pic_name);
		}
		else {
			#handling validation errors
			/*foreach($errors as $error) {
				echo $error;
			}*/
		}
	}

	function uploadPhoto($name, $file_tmp, $file_ext) {
		
		$pic_name = "../assets/images/".$name.".".$file_ext;

		if(move_uploaded_file($file_tmp, $pic_name))
			echo "User Registered Successfully and Image is uploaded.<br>";
		else 
			echo "Error uploading the image but user is registered.<br>";
	

		return $pic_name;
	}

?>