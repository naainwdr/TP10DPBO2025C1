<?php
require_once 'viewmodel/CategoryViewModel.php';
require_once 'viewmodel/ProductViewModel.php';
require_once 'viewmodel/SaleViewModel.php';

$entity = $_GET['entity'] ?? 'category';
$action = $_GET['action'] ?? 'list';

if ($entity == 'category') {
    $viewModel = new CategoryViewModel();
    if ($action == 'list') {
        $categoryList = $viewModel->getCategoryList();
        require 'views/category_list.php';
    } elseif ($action == 'add') {
        require 'views/category_form.php';
    } elseif ($action == 'edit') {
        $category = $viewModel->getCategoryById($_GET['id']);
        require 'views/category_form.php';
    } elseif ($action == 'save') {
        $viewModel->addCategory($_POST['name']);
        header('Location: index.php?entity=category');
    } elseif ($action == 'update') {
        $viewModel->updateCategory($_GET['id'], $_POST['name']);
        header('Location: index.php?entity=category');
    } elseif ($action == 'delete') {
        $viewModel->deleteCategory($_GET['id']);
        header('Location: index.php?entity=category');
    }

} elseif ($entity == 'product') {
    $viewModel = new ProductViewModel();
    if ($action == 'list') {
        $productList = $viewModel->getProductList();
        require 'views/product_list.php';
    } elseif ($action == 'add') {
        $categories = $viewModel->getCategories();
        require 'views/product_form.php';
    } elseif ($action == 'edit') {
        $product = $viewModel->getProductById($_GET['id']);
        $categories = $viewModel->getCategories();
        require 'views/product_form.php';
    } elseif ($action == 'save') {
        $viewModel->addProduct($_POST['name'], $_POST['category_id'], $_POST['price'], $_POST['stock']);
        header('Location: index.php?entity=product');
    } elseif ($action == 'update') {
        $viewModel->updateProduct($_GET['id'], $_POST['name'], $_POST['category_id'], $_POST['price'], $_POST['stock']);
        header('Location: index.php?entity=product');
    } elseif ($action == 'delete') {
        $viewModel->deleteProduct($_GET['id']);
        header('Location: index.php?entity=product');
    }

} elseif ($entity == 'sale') {
    $viewModel = new SaleViewModel();
    if ($action == 'list') {
        $saleList = $viewModel->getSaleList();
        require 'views/sale_list.php';
    } elseif ($action == 'add') {
        $products = $viewModel->getProducts();
        require 'views/sale_form.php';
    } elseif ($action == 'edit') {
        $sale = $viewModel->getSaleById($_GET['id']);
        $products = $viewModel->getProducts();
        require 'views/sale_form.php';
    } elseif ($action == 'save') {
        $viewModel->addSale($_POST['product_id'], $_POST['quantity'], $_POST['sale_date']);
        header('Location: index.php?entity=sale');
    } elseif ($action == 'update') {
        $viewModel->updateSale($_GET['id'], $_POST['product_id'], $_POST['quantity'], $_POST['sale_date']);
        header('Location: index.php?entity=sale');
    } elseif ($action == 'delete') {
        $viewModel->deleteSale($_GET['id']);
        header('Location: index.php?entity=sale');
    }
} else {
    echo "Invalid entity.";
}
?>
