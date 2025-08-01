<?php
use Core\Database;

use Models\Order;

if(isset($_SESSION['user']) && $_SESSION['role']=='user'){

// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);


$user_id = $_SESSION['id'];

// get orders

$order = new Order($db);
$orders = $order->get_orders($user_id);

// goto orders view 

require view('order.view.php',[
    'orders'=>$orders
]);
}
else{
    abort(403);
    exit;
}