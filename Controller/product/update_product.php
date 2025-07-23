<?php

use Core\Database;
use Models\Product;


// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);


$up_pro = new Product($db);



$_SESSION['edit'] = "Failed To Edit";
$id = $_POST['id'];
$name = $_POST['name'];

$price = $_POST['price'];

$image = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];

$uploadDir = 'products';


if (valid($name) && valid($price) && valid($id)) {


    $up_product = $up_pro->update_product($name, $price, $id);

    if ($up_product) {
        // remove the old image


        if (!empty($image)) {
            $old_pro = $up_pro->get_product($id);
            $ext = $old_pro['image'];
            remove_image($id, $ext, 'products');

            $ext = extension($image);
            upload_image($image, $tmp_name, $id, $uploadDir);
            $store_car = $update_car->store_image($ext, $id);
        }

        $_SESSION['update'] = "Updated Successfully";

    }

}


redirect('/home');



