<?php
use Core\Database;
use Models\Users;



// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);
$users = new Users($db);
// Get input values
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$errors = [];

// Validate inputs
if (!valid($email)) {
    $errors['email'] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
    // check if email is already found
} else if (!$users->unique($email)) {
    $errors['email'] = 'This email has been used.';
}

if (!valid($password)) {
    $errors['password'] = 'Password is required.';
}

if ($password != $confirm_password) {
    $errors['password'] = 'Password not match.';
}

// proceed if no validation errors
if (empty($errors)) {

    $add_user = $users->add_user($email,$password);
    if($add_user){
           $_SESSION['register'] = "Registed Successfully";
        redirect('/login');
    }
    else{
           $_SESSION['register'] = 'Failed To Register';
            redirect('/login');
    }

    // add user in database



}


require view('register.view.php', ['errors' => $errors]);
exit;
