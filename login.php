<?php
    session_start();
    if(isset($_SESSION['user-id'])) {
        switch ($_SESSION['admin']) {
            case 0:
                header("location:home.php");
                break;
            case 1:
                header("location:admin/index.php");
                break;
            default:
                header("location:login.php");
                break;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Cafe - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="login-container">
        <div class="overly">
            <h1 class="main-title">-- OS Coffee --</h1>

            <form action="#" method="post" class="login-form">

                <div class="form-control">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required class="form-input" placeholder="email">
                </div>

                <div class="from-control">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="password" required
                        class="form-input">
                </div>
                <a href="./forget-password.php" class="text-white"> forget password</a>
                <div class="form-control">
                    <input type="submit" class="btn submit" value="Login">
                </div>
            </form>

        </div>
    </div>
</body>

</html>

<?php
    require_once("database/database.inc.php");
    require_once("models/user.php");
    
    $dbServername = DB_HOST;
    $dbUsername = DB_USER;
    $dbPassword = DB_PWD;
    $dbname = DB_NAME;
    
    $dsn = 'mysql:host='.$dbServername.';dbname='.$dbname;
    $con = new \PDO($dsn, $dbUsername, $dbPassword);

    $user = new User($con);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($user->checkUserExist($email, $password)) {
            if($_SESSION['admin'] == 1)
                header("location:admin/index.php");
            else
                header("location:home.php");
        }
        else
        #handling what happens when credentials aren't correct
            ;
    }

?>