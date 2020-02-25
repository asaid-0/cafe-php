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

}
?>