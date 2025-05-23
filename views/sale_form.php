<?php
    require_once 'views/template/header.php';
    require_once 'viewmodel/ProductViewModel.php';

    $productVM = new ProductViewModel();
    $products = $productVM->getProductList();
?>

<h2 class="text-xl mb-4"><?php echo isset($sale) ? 'Edit Sale' : 'Add Sale'; ?></h2>
<form action="index.php?entity=sale&action=<?php echo isset($sale) ? 'update&id=' . $sale['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Product:</label>
        <select name="product_id" class="border p-2 w-full text-black" required>
            <option value="">-- Select Product --</option>
            <?php foreach ($products as $prod): ?>
                <option value="<?= $prod['id'] ?>" <?= (isset($sale) && $sale['product_id'] == $prod['id']) ? 'selected' : '' ?>>
                    <?= $prod['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Quantity:</label>
        <input type="number" name="quantity" value="<?= isset($sale) ? $sale['quantity'] : '' ?>" class="border p-2 w-full text-black" required>
    </div>
    <div>
        <label class="block">Sale Date:</label>
        <input type="date" name="sale_date" value="<?= isset($sale) ? $sale['sale_date'] : '' ?>" class="border p-2 w-full text-black" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
</form>

<br><a href="index.php?entity=sale&action=list" class="bg-gray-500 text-white px-3 py-1 rounded">Back to Sale List</a>

<?php
    require_once 'views/template/footer.php';
?>