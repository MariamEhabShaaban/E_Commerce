<?php require view('partials/header.php');
require view('partials/nav.php');
?>


    <div class="w-full h-full bg-white shadow-lg rounded-none overflow-auto">

        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Your Orders</h2>
        </div>

        <div class="overflow-x-auto px-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Order Date</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Cost</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $index => $order): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?= $index + 1 ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?= htmlspecialchars($order['date']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold"><?= number_format($order['cost'], 2) ?> $</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">No Orders</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>




<?php require view('partials/footer.php'); ?>