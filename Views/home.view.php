<?php require view('partials/header.php');
require view('partials/nav.php',[
    'email'=> $_SESSION['user']
]);
?>



<!-- show products  -->

<?php require view('partials/footer.php');?>