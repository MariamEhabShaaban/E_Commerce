<?php
use Core\Database;
use Models\Cart;
use Models\Product;
$id = $_POST['product_id'];
// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);

$prod = new Product($db);

$product = $prod->get_product($id);

$cart= new Cart($db);

$add_to = $cart->addTo_cart($product['name'] , $product['price'],$_SESSION['id']);

// add to cart

redirect('/home');




