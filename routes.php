<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php')->only('auth');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');

$router->get('/note', 'controllers/note/index.php')->only('auth');

$router->get('/edit', 'controllers/note/edit.php')->only('auth');
$router->patch('/edit', 'controllers/note/patch.php')->only('auth');

$router->get('/note/create', 'controllers/note/create.php')->only('auth');
$router->post('/note/create', 'controllers/note/create.php')->only('auth');

$router->delete('/note/destroy', 'controllers/note/destroy.php')->only('auth');

$router->get('/login', 'controllers/login.php')->only('guest');
$router->post('/login', 'controllers/login.php');

$router->get('/logout', 'controllers/logout.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/create.php');

return $router;
