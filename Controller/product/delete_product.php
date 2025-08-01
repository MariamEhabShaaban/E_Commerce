<?php
use Core\Database;
use Models\Product;
if(isset($_SESSION['user']) && $_SESSION['role']=='admin'){
 $_SESSION['delete']='Failed To Delete';
// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);


$del_pro = new Product($db);

$id= $_POST['product_id'];
$old_pro = $del_pro->get_product($id);
$ext = $old_pro['image'];
$delete = $del_pro->delete_product($id);
if($delete){
     
            remove_image($id, $ext, 'products');
    $_SESSION['delete']='Deleted Successfully';
}

redirect('/home');
}else{
   abort(403);
    exit;  
}