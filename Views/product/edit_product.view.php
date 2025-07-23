<?php require view('partials/header.php');
require view('partials/nav.php');
?>

<!-- add product  -->
<div class="max-w-md mx-auto mt-28 bg-white p-6 rounded-xl shadow-md">
  <h2 class="text-2xl font-semibold mb-4 text-center">Add New Product</h2>
  <form action="/update_product" method="POST" enctype="multipart/form-data" class="space-y-4">
     <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <div>
      <label class="block mb-1 font-medium">Product Name</label>
      <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" value="<?=$product['name']?>">
    </div>
    
    <div>
      <label class="block mb-1 font-medium">Price</label>
      <input type="number" name="price" class="w-full border border-gray-300 p-2 rounded"value="<?=$product['price']?>" >
    </div>
    
    <div>
      <label class="block mb-1 font-medium">Image</label>
      <input type="file" name="image" accept="image/*" class="w-full">
    </div>
    
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
      Edit Product
    </button>
  </form>
</div>


<?php require view('partials/footer.php');?>