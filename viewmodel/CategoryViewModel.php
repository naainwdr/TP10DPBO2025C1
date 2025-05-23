<?php
require_once 'model/Category.php';

class CategoryViewModel {
    private $category;

    public function __construct() {
        $this->category = new Category();
    }

    public function getCategoryList() {
        return $this->category->getAll();
    }

    public function getCategoryById($id) {
        return $this->category->getById($id);
    }

    public function addCategory($name) {
        return $this->category->create($name);
    }

    public function updateCategory($id, $name) {
        return $this->category->update($id, $name);
    }

    public function deleteCategory($id) {
        return $this->category->delete($id);
    }
}
?>
