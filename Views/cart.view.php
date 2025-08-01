<?php require view('partials/header.php'); ?>
<?php require view('partials/nav.php'); ?>

<div class="max-w-4xl mx-auto mt-16 p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Shopping Cart</h2>

    <?php if (!empty($cartItems)): ?>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Product Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr class="border-t">
                        <td class="px-4 py-2"><?= htmlspecialchars($item['product']) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($item['price']) ?> $</td>
                        <td class="px-4 py-2"><?= htmlspecialchars($item['quantity']) ?></td>
                        <td class="px-4 py-2 flex gap-2">
                            <form action="/cart/delete" method="POST">
                                <input type="hidden" name="name" value="<?= $item['product'] ?>">
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="mt-6 flex justify-between items-center">
            <div class="text-xl font-semibold">
                Total: <?= $total ?> $
            </div>
            <form action="/cart/order" method="POST">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                     Order Now
                </button>
            </form>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-500">Your cart is empty.</p>
    <?php endif; ?>
</div>

<?php require view('partials/footer.php'); ?>