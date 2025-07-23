<?php



use Core\Database;
use Models\Product;


// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);


$products = new Product($db);

$id = $_POST['product_id'];


$product = $products->get_product($id);


// view 

require view('product/edit_product.view.php',[
    'product'=>$product
]
);



