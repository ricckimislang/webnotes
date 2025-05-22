<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/login', 'controllers/login.php');
$router->get('/register', 'controllers/register.php');

$router->post('/contact', 'controllers/contact.php');
$router->post('/login', 'controllers/login.php');

return $router;