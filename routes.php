<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');

$router->get('/login', 'controllers/login.php');
$router->post('/login', 'controllers/login.php');

$router->get('/logout', 'controllers/logout.php');

$router->get('/register', 'controllers/register.php')->only('guest');
$router->post('/register', 'controllers/register.php');

return $router;
