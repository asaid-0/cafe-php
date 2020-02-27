<?php
class Order
{
    private $conn;
    public function __construct()
    {
        $db = Database::getInstance();
        $db->start();
        $this->conn = $db->getPDO();
    }

    public function create($user_id, array $product_ids, array $quantities, $notes)
    {

        try {
            $stmt = $this->conn->prepare('INSERT INTO `orders` (`status`, `user_id`, `notes`) VALUES ("processing", :user_id, :notes)');
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam(":notes", $notes, PDO::PARAM_STR);
            $stmt->execute();
            $order_id = $this->conn->lastInsertId();

            for ($i = 1; $i < count($product_ids); $i++) {
                $stmt = $this->conn->prepare('INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`) VALUES (:order_id, :product_id, :quantity)');
                $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
                $stmt->bindParam(":product_id", $product_ids[$i], PDO::PARAM_INT);
                $stmt->bindParam(":quantity", $quantities[$i], PDO::PARAM_INT);
                $stmt->execute();
            }

            return true;
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }


    public function getAllOrders($user_id){
        try {
            $query_list_orders = "Select * from orders where user_id=?;";
            $stmt_date_filter = $this->conn->prepare($query_list_orders);
            $stmt_date_filter->execute([$user_id]);
            $data = $stmt_date_filter->fetchAll(); 
            
            return $data;
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }

    public function adminGetOrders(){
        try {
            $query_list_orders = "Select *, (select name from users where id = user_id)name, (select room from users where id = user_id)room from orders";
            $stmt_date_filter = $this->conn->prepare($query_list_orders);
            $stmt_date_filter->execute();
            $data = $stmt_date_filter->fetchAll(); 
            
            return $data;
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }



    public function getOrderProducts($order_id){
        try {
            $query_order_products = "select id , name, pic, price , quantity from products , orders_products where order_id = ? and product_id = id ";
            $stmt_order_products = $this->conn->prepare($query_order_products);
            $stmt_order_products->execute([$order_id]);
            $data = $stmt_order_products->fetchAll();
            
            return $data;  
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }

    public function getFilteredOrders($user_id,$date_from,$date_to){

        try {
            $query_date_filter = "Select * from orders where user_id=? and date BETWEEN ? AND ?;";
            $stmt_date_filter = $this->conn->prepare($query_date_filter);
            $stmt_date_filter->execute([$user_id,$date_from,$date_to]);
            $data = $stmt_date_filter->fetchAll(); 
            
            return $data;
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }
    function setDone($id){
        $sql = "UPDATE orders SET status='done' WHERE id=:id";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    function setDeliver($id){

        $sql = "UPDATE orders SET status='out-for-delivery' WHERE id=:id";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        
    }
    // public function checkInputs($input)
    // {
    //     $input = htmlspecialchars($input);
    //     $input = trim($input);
    //     $input = stripslashes($input);
    //     return $input;
    // }

}
