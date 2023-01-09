<?php 

class CartDetail {
    private $conn;
    public $cart_id;
    public $product_id;
    public $quantity;
    public $created_at;
    public $last_updated;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function show() {
        $query = "SELECT * FROM `carts_details` WHERE cart_id=:cart_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cart_id', $this->cart_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function update() {
        $query = "UPDATE `carts_details` SET last_updated=:last_updated, quantity=:quantity WHERE cart_id=:cart_id AND product_id=:product_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->last_updated = htmlspecialchars(strip_tags($this->last_updated));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            $this->cart_id = htmlspecialchars(strip_tags($this->cart_id));
            $this->product_id = htmlspecialchars(strip_tags($this->product_id));
            
            $stmt->bindParam(':last_updated', $this->last_updated);
            $stmt->bindParam(':quantity', $this->quantity);
            $stmt->bindParam(':cart_id', $this->cart_id);
            $stmt->bindParam(':product_id', $this->product_id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function delete() {
        $query = "DELETE FROM `carts_details` WHERE cart_id=:cart_id AND product_id=:product_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->cart_id = htmlspecialchars(strip_tags($this->cart_id)); 
            $this->product_id = htmlspecialchars(strip_tags($this->product_id));

            $stmt->bindParam(':cart_id', $this->cart_id);
            $stmt->bindParam(':product_id', $this->product_id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function find() {
        $query = "SELECT * FROM `carts_details` WHERE cart_id=:cart_id AND product_id=:product_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->cart_id = htmlspecialchars(strip_tags($this->cart_id)); 
            $this->product_id = htmlspecialchars(strip_tags($this->product_id));

            $stmt->bindParam(':cart_id', $this->cart_id);
            $stmt->bindParam(':product_id', $this->product_id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function create() {
        if ($this->find()) {
            return false;
        }

        $query = "INSERT INTO `carts_details` (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, :quantity)";
        try {
            $stmt = $this->conn->prepare($query);
            $this->cart_id = htmlspecialchars(strip_tags($this->cart_id)); 
            $this->product_id = htmlspecialchars(strip_tags($this->product_id)); 
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));

            $stmt->bindParam(':cart_id', $this->cart_id);
            $stmt->bindParam(':product_id', $this->product_id);
            $stmt->bindParam(':quantity', $this->quantity);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

}
