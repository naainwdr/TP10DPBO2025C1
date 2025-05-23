<?php
    require_once 'views/template/header.php';
    require_once 'viewmodel/SaleViewModel.php';

    $vm = new SaleViewModel();

    if (isset($_GET['delete'])) {
        $vm->deleteSale($_GET['delete']);
        header("Location: index.php?entity=sale&action=list");
        exit;
    }
    // Fetch the list of sales
    $sales = $vm->getSaleList();
?>

<h2 class="text-xl mb-4">Sale List</h2>
<a href="index.php?entity=sale&action=add" class="bg-green-500 text-white px-3 py-1 rounded">+ Add Sale</a>
<table border="1" class="mt-4 w-full text-left border-collapse">
    <tr class="bg-red-800">
        <th class="p-2 border">ID</th>
        <th class="p-2 border">Product ID</th>  
        <th class="p-2 border">Quantity</th>
        <th class="p-2 border">Sale Date</th>
        <th class="p-2 border">Actions</th>
    </tr>
    <?php foreach ($sales as $sale): ?>
    <tr>
        <td class="p-2 border"><?= $sale['id'] ?></td>
        <td class="p-2 border"><?= $sale['product_name'] ?></td>
        <td class="p-2 border"><?= $sale['quantity'] ?></td>
        <td class="p-2 border"><?= $sale['sale_date'] ?></td>
        <td class="p-2 border">
            <a href="index.php?entity=sale&action=edit&id=<?= $sale['id'] ?>" class="text-blue-300">Edit</a> |
            <a href="index.php?entity=sale&action=list&delete=<?= $sale['id'] ?>" onclick="return confirm('Delete this record?')" class="text-red-500">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br> <a href="index.php" class="bg-gray-500 text-white px-3 py-1 rounded">Back to Home</a>

<?php
require_once 'views/template/footer.php';
?>