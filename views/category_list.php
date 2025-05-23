<?php
require_once 'views/template/header.php';
require_once 'viewmodel/CategoryViewModel.php';

$vm = new CategoryViewModel();

// Handle delete via GET
if (isset($_GET['delete'])) {
    $vm->deleteCategory($_GET['delete']);
    header("Location: index.php?entity=category&action=list");
    exit;
}

$categories = $vm->getCategoryList();
?>

<h2 class="text-xl mb-4">Category List</h2>
<a href="index.php?entity=category&action=add" class="bg-green-500 text-white px-3 py-1 rounded">+ Add Category</a>

<table border="1" class="mt-4 w-full text-left border-collapse">
    <tr class="bg-red-800">
        <th class="p-2 border">ID</th>
        <th class="p-2 border">Name</th>
        <th class="p-2 border">Actions</th>
    </tr>
    <?php foreach ($categories as $cat): ?>
    <tr>
        <td class="p-2 border"><?= $cat['id'] ?></td>
        <td class="p-2 border"><?= $cat['name'] ?></td>
        <td class="p-2 border">
            <a href="index.php?entity=category&action=edit&id=<?= $cat['id'] ?>" class="text-blue-300">Edit</a> |
            <a href="index.php?entity=category&action=list&delete=<?= $cat['id'] ?>" onclick="return confirm('Delete this category?')" class="text-red-500">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/template/footer.php'; ?>
