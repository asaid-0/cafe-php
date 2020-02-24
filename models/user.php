<?php
    // include("user.php");
    include("../database/config.php");

    $dbServername = DB_HOST;
    $dbUsername = DB_USER;
    $dbPassword = DB_PWD;
    $dbname = DB_NAME;

    $dsn = 'mysql:host='.$dbServername.';dbname='.$dbname;
    // $con = new \PDO($dsn, $dbUsername, $dbPassword);
    // define('con', new \PDO($dsn, $dbUsername, $dbPassword));

    function insertUser($name, $email, $password, $room, $ext, $pic) {
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
        $con = new \PDO($dsn, DB_USER, DB_PWD);
        
        try {
			//code...
			$query = 'INSERT INTO users (name, email, password, room, pic, ext) VALUES (?, ?, ?, ?, ?, ?)';
			$stmt = $con->prepare($query);
			$stmt->execute([$name, $email, $password, $room, $pic, $ext]);
			$result = $stmt->rowCount();
			$con = null;
		} catch (\Throwable $th) {
			echo "connection error"."<br>"."<br>";
		}
    }
    
    function selectUser ($id) {
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
        $con = new \PDO($dsn, DB_USER, DB_PWD);
        try {
            $query = "SELECT * FROM users WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->execute([$id]);
    
            $row = $stmt->fetch();

            $con = null;
            return $row;
        }  catch (\Throwable $th) {
            echo "Connection Error"."<br>"."<br>";
        }
    }
?>