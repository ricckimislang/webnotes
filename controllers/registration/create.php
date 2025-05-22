<?php

use Core\Database;
use Core\Authenticator;
use Core\Validator;

$db = new Database();
$conn = $db->connect();
$auth = new Authenticator($conn);
$validate = new Validator($conn);

function handleRegistration($email, $password, $validate, $auth)
{
    // Store old email in session
    old('old_email', $email);

    // Password validation
    if (!$validate->password($password, 'password', 8, 20)) {
        throw new Exception('Password must be between 8 and 20 characters');
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    // Check if email already exists in database
    if ($validate->checkUser($email)) {
        throw new Exception('Email already exists');
    }

    // Register user
    if ($auth->register($email, $password)) {
        flash('success', 'Registration successful');
        return true;
    }

    throw new Exception('Registration failed');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        if (handleRegistration($email, $password, $validate, $auth)) {
            unset($_SESSION['old_email']); // Clear old email from session after successful registration
            header('Location: /login');
        } else {
            header('Location: /register');
        }
        exit();
    } catch (Exception $e) {
        flash('error', $e->getMessage());
        header('Location: /register');
        exit();
    }
}

return require base_path('views/registration/create.view.php')
?>