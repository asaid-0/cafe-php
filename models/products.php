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

    public function addCategory($category){
            $stmt = $this->conn->prepare('INSERT INTO `categories` ( `name` ) VALUES (:category)');
            $stmt->bindParam(":category", $category, PDO::PARAM_STR);
            $stmt->execute();
            return $this->conn->lastInsertId();
    }
    function getProducts(){
        $query = "SELECT * FROM products";
        $data = $this->conn->query($query);
        return $data;
    }
    function getProduct($id){
        $query = "SELECT * FROM products where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function updateProduct($product, $cat_name){
        if($cat_name){
            $product['cat_id'] = $this->addCategory($cat_name);
        }
        try{
        $query = "UPDATE products SET name=:name, cat_id=:cat_id, price=:price, pic=:pic, isAvailable=:isAvailable WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($product);
        return true;
        }
        catch(PDOException $e) {
            echo 'Update failed!';
            echo 'Error: ' . $e->getMessage();
          }
    }

    public function addProduct($category, $name, $price, $pic, $newCat) {
        $cat_id = $category;
        if($newCat){
            $cat_id = $this->addCategory($category);
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
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    function setUnavailable($id){

        $sql = "UPDATE products SET isAvailable=0 WHERE id=:id";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteProduct($id) {
        try {
            $query = "DELETE FROM products WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $this->deletePhoto($id);
        } catch (\Throwable $th) {
            echo "connection error"."<br>"."<br>". $th;
            die();
        }
        
    }

    public function deletePhoto($id) {
        try {
            $query = "SELECT pic FROM products WHERE id=?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if(file_exists($row["pic"]))
                unlink($row["pic"]);
        } catch (\Throwable $th) {
            echo "connection error"."<br>"."<br>". $th;
            die();
        }

    }
    

}
?>