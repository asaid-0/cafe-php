<?php

class Products
{
    private $conn; //pdo object
    public function __construct()
    {
        $db = Database::getInstance();
        $db->start();
        $this->conn = $db->getPDO();
    }



    function getProducts(){
        $query = "SELECT * FROM products";
        $data = $this->conn->query($query);
        return $data;
    }

    public function addProduct($category, $name, $price, $pic, $newCat) {
        $cat_id = $category;
        if($newCat){
            //insert new category
            $stmt = $this->conn->prepare('INSERT INTO `categories` ( `name` ) VALUES (:category)');
            $stmt->bindParam(":category", $category, PDO::PARAM_STR);
            $stmt->execute();
            $cat_id = $this->conn->lastInsertId();
        }
        try {
            $query = 'INSERT INTO products (cat_id, name, price, pic) VALUES (:cat_id, :name, :price, :pic)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":cat_id", $cat_id, PDO::PARAM_INT);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":pic", $pic, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            echo "connection error"."<br>"."<br>";
        }
    }
    function setAvailable($id){
        $sql = "UPDATE products SET isAvailable=1 WHERE id=:id";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    function setUnavailable($id){

        $sql = "UPDATE products SET isAvailable=0 WHERE id=:id";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    

}
?>