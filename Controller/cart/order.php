<?php
use Core\Database;
use Models\Cart;
use Models\Order;
if(isset($_SESSION['user']) && $_SESSION['role']=='user'){
// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);

$cart = new Cart($db);
$user_id=$_SESSION['id'];
$total = $cart->total($user_id);

$order = new Order($db);

$add_order= $order->add_order($user_id,$total);

$clear = $cart->clearCart($user_id);

redirect('/home');
}else{
    abort(403);
    exit;
}