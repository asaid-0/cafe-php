<?php
    class user {
        private $conn;

        public function __construct()
        {
            $db = Database::getInstance();
            $db->start();
            $this->conn = $db->getPDO();
        }

        public function selectAllUsers() {
            try {
                $query = "SELECT * FROM users";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();

                $row = $stmt->fetchAll();
                return $row;
            } catch(\Throwable $th) {
                echo "Connection Error"."<br>"."<br>";
            }

        }

        public function addNewUser($name, $email, $password, $room, $ext, $pic) {
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

                return $row;
            }  catch (\Throwable $th) {
                echo "Connection Error"."<br>"."<br>";
            }
        }

        public function checkUserExist($email, $password) {
            try {
                $query = "SELECT * FROM users WHERE email=? AND password=?";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$email, $password]);

                $result = $stmt->rowCount();

                $row = $stmt->fetch();

                session_start();

                $_SESSION['user-id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['admin'] = $row['isAdmin'];
                $_SESSION['imgPath'] = $row['pic'];
                $_SESSION['room'] = $row['room'];
                $_SESSION['ext'] = $row['ext'];
                
                if($result <= 0)
                   return false;
                else
                    return true;

            } catch (\Throwable $th) {
                echo "Connection Error"."<br>"."<br>";
            }
        }

        public function updateUserData($id, $name, $email, $password, $room, $ext) {//, $file_name, $file_tmp) {
            try {
                
                $query = "UPDATE users SET name=?, email=?, password=?, room=?, ext=? WHERE id=?";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$name, $email, $password, $room, $ext, $id]);
                //$con = null;
            } catch (\Throwable $th) {
                echo "connection error"."<br>"."<br>";
            }
        }

        public function deleteUser($id) {
            try {
                $query = "DELETE FROM users WHERE id = ?";
                $stmt = $this->conn->prepare($query);
                //echo hello;
                //var_dump($row);
                $stmt->execute([$id]);
            } catch (\Throwable $th) {
                echo "connection error"."<br>"."<br>";
            }
        }

        public function deletePhoto($id) {
            try {
                $query = "SELECT pic FROM users WHERE id=?";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$id]);
                $row = $stmt->fetch();
                
                if(file_exists($row["pic"]))
                    unlink($row["pic"]);
                
            } catch (\Throwable $th) {
                echo "connection error"."<br>"."<br>";
            }

        }
    }
?>