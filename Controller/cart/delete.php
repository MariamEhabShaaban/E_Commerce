<?php
use Core\Database;
use Models\Cart;

// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);

$prod = new Cart($db);
$product = $_POST['name'];
$user_id=$_SESSION['id'];

$delete = $prod->decreaseQuantity($product,$user_id);

redirect('/cart');