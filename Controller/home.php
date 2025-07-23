<?php

use Core\Database;
use Models\Product;


// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);
// get all products
$product = new Product($db);

$products = $product->get_all_products();
if(isset($_SESSION['user'])){
require view('home.view.php',[
    'email'=> $_SESSION['user'],
    'products'=>$products
]);
}
else{
    abort(403);
    exit;
}