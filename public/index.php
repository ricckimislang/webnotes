<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Database;

$db = new Database();

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require base_path("{$class}.php");
});

$router = new \Core\Router();
$router = require base_path('routes.php'); // <- This works if routes.php returns the $router

$parsedUri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = rtrim($parsedUri, '/') ?: '/';

$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
