<?php
    session_start();
    if(!isset($_SESSION['id']))
        header("location:../login.php");

        require_once("../models/user.php");
        include "../database/config.php";
        
        $dbServername = DB_HOST;
        $dbUsername = DB_USER;
        $dbPassword = DB_PWD;
        $dbname = DB_NAME;
      
        $dsn = 'mysql:host='.$dbServername.';dbname='.$dbname;
        $con = new \PDO($dsn, $dbUsername, $dbPassword);
      
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
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
      
              if($confirm != "") {
                  if($confirm != $password)
                      $errors["confirm"] = "Confirm Password field should match Password field.<br>";
              }
              else {
                  $errors["confirm"] = "Confirm Password field is required.<br>";
              }
      
              if($room == "") 
                  $errors["room"] = "Please enter the room number.<br>";
      
              if(!empty($file_name)) {
                  $extens = explode('.', $file_name);
                  $file_ext = strtolower(end($extens));
                  $extensions = array("jpeg", "jpg", "png");
              
                  if(in_array($file_ext, $extensions) === false){
                      $errors["file"] = "extension not allowed, please choose a JPEG, JPG or PNG file.";
                  } 
              }
              else {
                  $errors["file"] = "No Photos uploaded.<br>";
          }
      
        /*******************Data is validated and ready for insertion*******************/
      
          if(empty($errors)) {
            $pic_name = uploadPhoto($name, $file_tmp, $file_ext);
            $user = new User($con);
            $user->addNewUser($name, $email, $password, $room, $ext, $pic_name);
          }
          else {
            error_log(print_r($errors, TRUE)); 
            $_SESSION['errors'] = $errors;
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
        <span>
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Admin Dashboard</span>
            </a>


            <a href="../logout.php">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
            </a>


        </span>
    </nav>
    <section>
        <div class="add-container">
            <div class="main-title">Add User</div>
            <div id='form' class='_form'>
                <form action='add-user.php' method='POST' enctype="multipart/form-data" name='addUser'>
              
                  <fieldset>
                    <legend>NAME</legend>
                    <input type='text' name='name' placeholder='Name' />
                    <span class="error"><?php echo !empty($_SESSION['errors']["name"]) ? $_SESSION['errors']["name"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>EMAIL</legend>
                    <input type='text' name='email' placeholder='Email' />
                    <span class="error"><?php echo !empty($_SESSION['errors']["email"]) ? $_SESSION['errors']["email"] : ""; ?></span>
                  </fieldset>
              
                  <fieldset>
                    <legend>PASSWORD</legend>
                    <input type='password' name='password' placeholder='password' />
                    <span class="error"><?php echo !empty($_SESSION['errors']["password"]) ? $_SESSION['errors']["password"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>CONFIRM PASSWORD</legend>
                    <input type='password' name='confirm_password' placeholder='confirm password' />
                    <span class="error"><?php echo !empty($_SESSION['errors']["confirm"]) ? $_SESSION['errors']["confirm"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>ROOM NO.</legend>
                    <input type='text' name='room' placeholder='Room No.' />
                    <span class="error"><?php echo !empty($_SESSION['errors']["room"]) ? $_SESSION['errors']["room"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>EXT.</legend>
                    <input type='text' name='ext' placeholder='Ext.' />
                    <span class="error"><?php echo !empty($_SESSION['errors']["ext"]) ? $_SESSION['errors']["ext"] : ""; ?></span>
                  </fieldset>

                  <fieldset>
                    <legend>PROFILE PICTURE</legend>
                    <label for="file" class="file-upload">
                      <span class="fa fa-cloud-upload"><span> Upload
                    </label>
                    <input type='file' name='file' id="file" />
                    <span class="error"><?php echo !empty($_SESSION['errors']["file"]) ? $_SESSION['errors']["file"] : ""; if(isset($_SESSION['errors'])) unset($_SESSION['errors']); ?></span>
                  </fieldset>
                  
                  <input type='submit' name='submit' value='Add' />
                </form>
              </div>
        </div>
    </section>
</body>
</html>