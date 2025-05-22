<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/login', 'controllers/login.php');
$router->get('/register', 'controllers/register.php');
$router->get('/logout', 'controllers/logout.php');

$router->post('/login', 'controllers/login.php');
$router->post('/register', 'controllers/register.php');

return $router;
