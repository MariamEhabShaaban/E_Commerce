<?php require view('partials/header.php');
require view('partials/nav.php');
?>

<!-- show products  -->
<div class="bg-gray-100 py-10 px-4 sm:px-6 lg:px-8">

    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 mt-10">Our Products</h2>
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <div class="flex justify-end mb-6">
                <a href="/add_product"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition">
                    + Add Product
                </a>
            </div>
        <?php endif ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <?php foreach ($products as $product): ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
    <!-- Image Container -->
    <div class="h-48 w-full overflow-hidden">
        <img class="object-cover w-full h-full"
             src="<?= '/uploads/products/' . $product['id'] . '.' . $product['image'] ?>"
             alt="<?= $product['name'] ?>" />
    </div>

    <!-- Product Info -->
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-2"><?= $product['name'] ?></h3>
        <p class="text-gray-600 mb-4">Price: $<?= $product['price'] ?></p>

        <?php if ($_SESSION['role'] == 'admin'): ?>
            <form action="/delete_product" method="POST">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit"
                        class="w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                    Delete
                </button>
            </form>

            <form action="/edit_product" method="POST">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mt-5">
                    Edit
                </button>
            </form>
        <?php else: ?>
            <form action="/addTo" method="POST">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Add to Cart
                </button>
            </form>
        <?php endif ?>
    </div>
</div>

            <?php endforeach; ?>
        </div>

    </div>
</div>


<?php require view('partials/footer.php'); ?>