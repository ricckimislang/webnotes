<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}
function base_path($path = '')
{
    return __DIR__ . ($path ? '/' . ltrim($path, '/') : '');
}

function old($key, $attribute = '')
{
    return $_SESSION[$key] = $attribute;
}

function flash($key, $message)
{
    if (!isset($_SESSION['_flash'])) {
        $_SESSION['_flash'] = [];
    }
    $_SESSION['_flash'][$key] = $message;
}

function getFlash($key)
{
    if (isset($_SESSION['_flash'][$key])) {
        $message = $_SESSION['_flash'][$key];
        unset($_SESSION['_flash'][$key]);
        return $message;
    }
    return null;
}

function isFlashed($key)
{
    return isset($_SESSION['_flash'][$key]);
}

function showToast()
{
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
    }
}
