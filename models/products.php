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

    function addProduct(){


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