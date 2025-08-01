<?php
use Core\Database;
use Models\Cart;
if(isset($_SESSION['user']) && $_SESSION['role']=='user'){
// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);

$prod = new Cart($db);
$product = $_POST['name'];
$user_id=$_SESSION['id'];

$delete = $prod->decreaseQuantity($product,$user_id);

redirect('/cart');
}
else{
    abort(403);
    exit;
}