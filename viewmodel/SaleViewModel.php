<?php
require_once 'model/Sale.php';

class SaleViewModel {
    private $sale;
    private $product;

    public function __construct() {
        $this->sale = new Sale();
        $this->product = new Product();
    }

    public function getSaleList() {
        return $this->sale->getAll();
    }

    public function getSaleById($id) {
        return $this->sale->getById($id);
    }

    public function getProducts() {
        return $this->product->getAll();
    }  

    public function addSale($product_id, $quantity, $sale_date) {
        return $this->sale->create($product_id, $quantity, $sale_date);
    }

    public function updateSale($id, $product_id, $quantity, $sale_date) {
        return $this->sale->update($id, $product_id, $quantity, $sale_date);
    }

    public function deleteSale($id) {
        return $this->sale->delete($id);
    }
}
?>
