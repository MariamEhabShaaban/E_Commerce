<?php
use Core\Database;
use Models\Users;


// load configuration and database connection
$config = require base_path('config.php');
$db = new Database($config['database']);

// Get input values
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];

// Validate inputs
if (!valid($email)) {
    $errors['email'] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!valid($password)) {
    $errors['password'] = 'Password is required.';
}

// proceed if no validation errors
if (empty($errors)) {
    $users = new Users($db);
    $user = $users->get_user($email, $password);
   
    if (!$user) {
        $errors = $users->error(); 
        require view('login.view.php', ['errors' => $errors]);
        exit;
    }

    // login successful
    $_SESSION['user'] = $email;
    redirect('/home');
  
}


require view('login.view.php', ['errors' => $errors]);
exit;
