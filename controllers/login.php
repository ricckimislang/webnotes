<?php

use Core\Database;
use Core\Authenticator;
use Core\Validator;

$db = new Database();
$auth = new Authenticator($db->connect());
$validate = new Validator($db->connect());

function handleLogin($email, $password, $auth, $validate)
{
    // Store old email in session
    old('old_email', $email);
    if (!$validate->checkUser($email)) {
        throw new Exception('Invalid email or password');
    }

    // if email exists then proceed to check with the login password
    if ($auth->login($email, $password)) {
        unset($_SESSION['old_email']); // Clear old email from session after successful logi
        header('Location: /');
        exit();
    } else {
        header('Location: /login');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    try {
        handleLogin($email, $password, $auth, $validate);
    } catch (Exception $e) {
        flash('error', $e->getMessage());
        header('Location: /login');
        exit();
    }
}

require 'views/login/index.php';
