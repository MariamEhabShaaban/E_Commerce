<?php

if(isset($_SESSION['user'])){
require view('home.view.php');
}
else{
    abort(403);
    exit;
}