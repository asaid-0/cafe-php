<?php


class Checks
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getChecks()
    {
        try {
            $stmt = $this->conn->prepare('select o.user_id, sum(price*quantity)total, (select name from users where id = user_id)user_name from orders as o, orders_products as op, products as p where op.order_id = o.id AND op.product_id=p.id group by user_id');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }
    public function getChecksOrders($user_id){

        try {
            $stmt = $this->conn->prepare('select o.date, o.id, o.status, sum(price*quantity)sub_total from orders as o, orders_products as op, products as p where op.order_id = o.id AND op.product_id=p.id AND user_id = :user_id group by order_id');
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
        }
    }
    
}
