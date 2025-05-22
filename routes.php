<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php')->only('auth');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');

$router->get('/login', 'controllers/login.php')->only('guest');
$router->post('/login', 'controllers/login.php');

$router->get('/logout', 'controllers/logout.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/create.php');

return $router;
