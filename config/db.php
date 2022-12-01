<?php 
// connect database PDO
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "hs123478";
    private $conn;

    public function connect() {
      $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=".$this->servername.";dbname=cart", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
      return $this->conn;
    }
}
?>