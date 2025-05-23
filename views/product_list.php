<?php
require_once 'views/template/header.php';
require_once 'viewmodel/ProductViewModel.php';

$vm = new ProductViewModel();

// Handle delete
if (isset($_GET['delete'])) {
    $vm->deleteProduct($_GET['delete']);
    header("Location: index.php?entity=product&action=list");
    exit;
}

$products = $vm->getProductList();
?>

<h2 class="text-xl mb-4">Product List</h2>
<a href="index.php?entity=product&action=add" class="bg-green-500 text-white px-3 py-1 rounded">+ Add Product</a>

<table border="1" class="mt-4 w-full text-left border-collapse">
    <thead class="bg-red-800">
        <tr>
            <th class="p-2 border">ID</th>
            <th class="p-2 border">Name</th>
            <th class="p-2 border">Category</th>
            <th class="p-2 border">Price</th>
            <th class="p-2 border">Stock</th>
            <th class="p-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $prod): ?>
        <tr>
            <td class="p-2 border"><?= $prod['id'] ?></td>
            <td class="p-2 border"><?= $prod['name'] ?></td>
            <td class="p-2 border"><?= $prod['category_name'] ?? 'Uncategorized' ?></td>
            <td class="p-2 border"><?= $prod['price'] ?></td>
            <td class="p-2 border"><?= $prod['stock'] ?></td>
            <td class="p-2 border">
                <a href="index.php?entity=product&action=edit&id=<?= $prod['id'] ?>" class="text-blue-300">Edit</a> |
                <a href="index.php?entity=product&action=list&delete=<?= $prod['id'] ?>" onclick="return confirm('Delete this product?')" class="text-red-500">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br> <a href="index.php" class="bg-gray-500 text-white px-3 py-1 rounded">Back to Home</a>

<?php require_once 'views/template/footer.php'; ?>
