<?php
    class user {
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        function addNewUser($name, $email, $password, $room, $ext, $pic) {
            try {
                //code...
                $query = 'INSERT INTO users (name, email, password, room, pic, ext) VALUES (?, ?, ?, ?, ?, ?)';
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$name, $email, $password, $room, $pic, $ext]);
                $result = $stmt->rowCount();
                
                return true;
            } catch (\Throwable $th) {
                echo "connection error"."<br>"."<br>";
            }
        }

        public function selectUser ($id) {
            //$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
            //$con = new \PDO($dsn, DB_USER, DB_PWD);
            try {
                $query = "SELECT * FROM users WHERE id=?";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$id]);
        
                $row = $stmt->fetch();
    
                //$con = null;
                return $row;
            }  catch (\Throwable $th) {
                echo "Connection Error"."<br>"."<br>";
            }
        }

        public function checkUserExist($email, $password) {
            $query = "SELECT * FROM users WHERE email=? AND password=?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email, $password]);

            $result = $stmt->rowCount();

            if($result <= 0)
                return false;
            else
                return true;
        }
    }
?>