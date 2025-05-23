<?php
require_once 'config/Database.php';

class Sale {
    private $conn;
    private $table = 'sales';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $query = "SELECT s.id, s.product_id, s.quantity, s.sale_date, p.name AS product_name
                  FROM sales s
                  LEFT JOIN products p ON s.product_id = p.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($product_id, $quantity, $sale_date) {
        $query = "INSERT INTO " . $this->table . " (product_id, quantity, sale_date) 
                  VALUES (:product_id, :quantity, :sale_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':sale_date', $sale_date);
        return $stmt->execute();
    }

    public function update($id, $product_id, $quantity, $sale_date) {
        $query = "UPDATE " . $this->table . " 
                  SET product_id = :product_id, quantity = :quantity, sale_date = :sale_date 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':sale_date', $sale_date);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
