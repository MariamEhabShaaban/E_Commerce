<?php

use Core\Database;
use Models\Product;


// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);


$add_pro = new Product($db);



$_SESSION['add'] = "Failed To Add";

$name = $_POST['name'];

$price = $_POST['price'];

$image = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];

$uploadDir = 'products';


if (valid($name) && valid($price) && valid($image) ) {


    $store_product = $add_pro->add_product($name,$price);

    if ($store_product) {
        $productId = $store_product;
        $ext = extension($image);
        upload_image($image, $tmp_name, $productId , $uploadDir);
        $store_product = $add_pro->store_image($ext,$productId );
        if($store_product)
        $_SESSION['add'] = "Added Successfully";

    }
}

redirect('/home');



