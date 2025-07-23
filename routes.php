<?php
$router->get('/', 'login.php');
$router->get('/login', 'login.php');
$router->get('/logout', 'logout.php');
$router->get('/home', 'home.php');
$router->get('/profile', 'profile.php');
$router->post('/attempt_login','attempt_login.php');
$router->get('/register','register.php');
$router->post('/store_user','store_user.php');
$router->get('/add_product','product/add_product.php');
$router->post('/store_product','product/store_product.php');
$router->post('/edit_product','product/edit_product.php');$router->post('/update_product','product/update_product.php');
$router->post('/edit_product','product/edit_product.php');$router->post('/delete_product','product/delete_product.php');
