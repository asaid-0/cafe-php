<?php

include "../database/database.inc.php";
class Checks
{
    private $conn; //pdo object
    public function __construct()
    {
        $db = Database::getInstance();
        $db->start();
        $this->conn = $db->getPDO();
    }
    public function getChecks($user_id)
    {
        try {
            if($user_id != null){
                $query = 'select o.user_id, sum(price*quantity)total, (select name from users where id = user_id)user_name from orders as o, orders_products as op, products as p where op.order_id = o.id AND op.product_id=p.id group by user_id HAVING user_id = :user_id';
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            }else{
                $query = 'select o.user_id, sum(price*quantity)total, (select name from users where id = user_id)user_name from orders as o, orders_products as op, products as p where op.order_id = o.id AND op.product_id=p.id group by user_id';
                $stmt = $this->conn->prepare($query);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }
    public function getChecksOrders($user_id, $from, $to){
        try {
            $stmt = $this->conn->prepare('SELECT * from(select o.date, o.id, o.status, sum(price*quantity)sub_total from orders as o, orders_products as op, products as p where op.order_id = o.id AND op.product_id=p.id AND user_id = :user_id group by order_id)orders WHERE date BETWEEN timestamp(:from) AND timestamp(:to)');
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam(":from", $from, PDO::PARAM_STR);
            $stmt->bindParam(":to", $to, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }



    public function getOrderProducts($order_id){
        try {
            $stmt = $this->conn->prepare('select op.order_id, op.product_id, op.quantity, p.name, p.price, p.pic, quantity*price as subtotal from orders_products as op, products as p WHERE op.order_id = :order_id AND p.id = op.product_id');
            $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }
    
    
}
