<?php 

class Cart {
    private $conn;
    public $id;
    public $user_id;
    public $cart_id;
    public $created_at;
    public $last_updated;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM `carts`";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        } 

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update() {
        $query = "UPDATE `carts` SET last_updated=:last_updated WHERE cart_id=:cart_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->last_updated = htmlspecialchars(strip_tags($this->last_updated));
            
            $stmt->bindParam(':last_updated', $this->last_updated);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function delete() {
        $query = "DELETE FROM `carts` WHERE user_id=:user_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->user_id = htmlspecialchars(strip_tags($this->user_id)); 
            $stmt->bindParam(':user_id', $this->user_id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function create() {
        $query = "INSERT INTO `carts` (id, user_id, cart_id) VALUES (:id, :user_id, :cart_id)";
        try {
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id)); 
            $this->user_id = htmlspecialchars(strip_tags($this->user_id)); 
            $this->cart_id = htmlspecialchars(strip_tags($this->cart_id));

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':cart_id', $this->cart_id);

            $stmt->execute();
        } catch (PDOException $e) {
            // echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

}