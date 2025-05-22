<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION['user']);
$_SESSION = [];

// Destroy the session cookie (optional, but good practice)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session
session_destroy();
flash('success', 'You have been logged out.');
header('location: /login');
exit();