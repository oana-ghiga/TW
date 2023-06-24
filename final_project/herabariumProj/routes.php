<?php

$router->get('/', 'controllers/meow.php');
$router->get('/login', 'controllers/login.php');
$router->get('/register', 'controllers/register.php');
$router->get('/password', 'controllers/password.php');
$router->get('/main', 'controllers/main.php');
$router->get('/mainPage', 'controllers/mainPage.php');
$router->get('/album', 'controllers/album/index.php')->only('auth');
$router->get('/album/{id}', 'controllers/album/show.php')->only('auth');
$router->get('/plant/{id}', 'controllers/plant/show.php')->only('auth');
$router->get('/profile', 'controllers/profile.php')->only('auth');
$router->get('/rss', 'controllers/rss.php')->only('auth');
$router->get('/logout', 'controllers/logout.php')->only('auth');
$router->get('/top', 'controllers/top.php');
$router->post('/top', 'controllers/top.php');
$router->get('/about', 'controllers/about.php');


$router->post('/authenticate', 'controllers/authenticate.php');
$router->post('/storeUser', 'controllers/storeUser.php');
$router->put('/changePass', 'controllers/changePass.php');


$router->get('/api/v1/album', 'controllers/rest/album/index.php');
$router->get('/api/v1/album/{id}', 'controllers/rest/album/show.php');
$router->get('/api/v1/album/user/{id}', 'controllers/rest/album/findAllByUser.php');
$router->get('/api/v1/plant', 'controllers/rest/plant/index.php');
$router->get('/api/v1/plant/{id}', 'controllers/rest/plant/show.php');
