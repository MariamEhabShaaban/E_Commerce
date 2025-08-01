<?php
use Core\Database;
use Models\Cart;
if(isset($_SESSION['user']) && $_SESSION['role']=='user'){
// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);
$user_id=$_SESSION['id'];
$cart = new Cart($db);
$cartItems = $cart->get_cart($user_id);  // name price quantity 
$total = $cart->total($user_id);

require view('cart.view.php',[
    'cartItems'=>$cartItems,
    'total'=>$total
]);
}else{
    abort(403);
    exit;
}