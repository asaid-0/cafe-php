<?php


class Order
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
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


    // public function checkInputs($input)
    // {
    //     $input = htmlspecialchars($input);
    //     $input = trim($input);
    //     $input = stripslashes($input);
    //     return $input;
    // }

}
