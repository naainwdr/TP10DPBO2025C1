<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($category) ? 'Edit Category' : 'Add Category'; ?></h2>
<form action="index.php?entity=category&action=<?php echo isset($category) ? 'update&id=' . $category['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block font-semibold">Name:</label>
        <input type="text" name="name" value="<?php echo isset($category) ? $category['name'] : ''; ?>" class="border p-2 w-full text-black" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
</form>

<br><a href="index.php?entity=category&action=list" class="bg-gray-500 text-white px-3 py-1 rounded">Back to Category List</a>

<?php require_once 'views/template/footer.php'; ?>
