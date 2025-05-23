<?php
require_once 'model/Product.php';
require_once 'model/Category.php';

class ProductViewModel {
    private $product;
    private $category;

    public function __construct() {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function getProductList() {
        return $this->product->getAll();
    }

    public function getProductById($id) {
        return $this->product->getById($id);
    }

    public function getCategories() {
        return $this->category->getAll();
    }

    public function addProduct($name, $category_id, $price, $stock) {
        return $this->product->create($name, $category_id, $price, $stock);
    }

    public function updateProduct($id, $name, $category_id, $price, $stock) {
        return $this->product->update($id, $name, $category_id, $price, $stock);
    }

    public function deleteProduct($id) {
        return $this->product->delete($id);
    }
}
?>
