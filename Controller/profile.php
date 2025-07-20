<?php
if(isset($_SESSION['user'])){
$email=$_SESSION['user'];
require view('profile.view.php',[
    'email'=>$email
]);
}
else{
abort(403);
    exit;
}
?>
