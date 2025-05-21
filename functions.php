<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function old($key, $attribute = '') {
    return $_SESSION[$key] = $attribute;
}

function flash($key, $message) {
    if (!isset($_SESSION['_flash'])) {
        $_SESSION['_flash'] = [];
    }
    $_SESSION['_flash'][$key] = $message;
}

function getFlash($key) {
    if (isset($_SESSION['_flash'][$key])) {
        $message = $_SESSION['_flash'][$key];
        unset($_SESSION['_flash'][$key]);
        return $message;
    }
    return null;
}

function isFlashed($key) {
    return isset($_SESSION['_flash'][$key]);
}

function showToast() {
    $types = ['success', 'error', 'warning', 'info'];
    $html = '';
    foreach ($types as $type) {
        if (isFlashed($type)) {
            $message = getFlash($type);
            $html .= "<div class='toast toast-{$type}' id='toast-{$type}'>{$message}</div>";
        }
    }
    if ($html) {
        echo $html;
        echo "<style>
            .toast {
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 25px;
                border-radius: 5px;
                color: white;
                margin-bottom: 10px;
                opacity: 0;
                animation: fadeInOut 5s ease-in-out;
            }
            .toast-success { background-color: #4CAF50; }
            .toast-error { background-color: #f44336; }
            .toast-warning { background-color: #ff9800; }
            .toast-info { background-color: #2196F3; }
            @keyframes fadeInOut {
                0% { opacity: 0; transform: translateX(100%); }
                10% { opacity: 1; transform: translateX(0); }
                90% { opacity: 1; transform: translateX(0); }
                100% { opacity: 0; transform: translateX(100%); }
            }
        </style>";
    }
}
?>