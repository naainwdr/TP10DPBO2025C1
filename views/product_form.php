<?php
require_once 'views/template/header.php';
require_once 'viewmodel/CategoryViewModel.php';

$categoryVM = new CategoryViewModel();
$categories = $categoryVM->getCategoryList();
?>

<h2 class="text-xl mb-4"><?php echo isset($product) ? 'Edit Product' : 'Add Product'; ?></h2>
<form action="index.php?entity=product&action=<?php echo isset($product) ? 'update&id=' . $product['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?= isset($product) ? $product['name'] : '' ?>" class="border p-2 w-full text-black" required>
    </div>
    <div>
        <label class="block">Category:</label>
        <select name="category_id" class="border p-2 w-full text-black">
            <option value="">-- Select Category --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= (isset($product) && $product['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                    <?= $cat['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Price:</label>
        <input type="number" name="price" value="<?= isset($product) ? $product['price'] : '' ?>" class="border p-2 w-full text-black" required>
    </div>
    <div>
        <label class="block">Stock:</label>
        <input type="number" name="stock" value="<?= isset($product) ? $product['stock'] : '' ?>" class="border p-2 w-full text-black" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
</form>

<br><a href="index.php?entity=product&action=list" class="bg-gray-500 text-white px-3 py-1 rounded">Back to Product List</a>

<?php require_once 'views/template/footer.php'; ?>
