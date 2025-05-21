<?php

use Core\Database;
use Core\Authenticator;

session_start();

$db = new Database();
$auth = new Authenticator($db->connect());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    if ($auth->login($email, $password)) {
        header('Location: /');
        exit;
    }

    $error = 'Invalid email or password';
}

require 'views/login/index.php';
?>