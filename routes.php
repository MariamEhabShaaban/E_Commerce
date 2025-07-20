<?php
$router->get('/', 'login.php');
$router->get('/login', 'login.php');
$router->get('/logout', 'logout.php');
$router->get('/home', 'home.php');
$router->get('/profile', 'profile.php');
$router->post('/attempt_login','attempt_login.php');
$router->get('/register','register.php');
$router->post('/store_user','store_user.php');