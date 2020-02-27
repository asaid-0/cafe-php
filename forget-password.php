 <?php
    require_once("models/user.php");
    require_once("database/database.inc.php");
    $user = new User();
    //if(isset($_SESSION['user-id'])) {
      //  switch ($_SESSION['admin']) {
        //    case 0:
          //      header("location:home.php");
            //    break;
            //case 1:
              //  header("location:admin/index.php");
            //    break;
            //default:
              //  header("location:login.php");
             //   break;
       // }
   // }
   
    
   if(isset($_POST['password'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];
        var_dump($_POST['password']);
        var_dump($_POST['email']);
        $isUpdated = $user->updateUserPassword($email , $password);
        if($isUpdated){
            header("location:login.php");
        }
   }
   else{
        // header("location:./forget-password.php");
   }
?>
    
<!DOCTYPE html>
<html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>OS Cafe - Forget Password</title>
            <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
            
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
        
        <body>
            <div class="login-container">
                <div class="overly">
                    <h1 class="main-title">-- OS Coffee --</h1>
                    <form action="" method="POST" class="login-form">
                        <div class="form-control">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" required class="form-input" placeholder="email">
                        </div>
                        <div class="from-control">
                            <label for="password">Enter The New Password</label>
                            <input type="password" name="password" id="password" placeholder="password" required
                            class="form-input">
                        </div>
                        <!-- <a href="#" class="text-white"> forget password</a> -->
                        <div class="form-control">
                            <input type="submit" class="btn submit" name="submit_btn" value="Login">
                        </div>
                    </form>
                    <!-- formmethod="POST" formaction="./forget-password.php" -->
                </div>
            </div>
        </body>
</html>
