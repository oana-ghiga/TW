<?php
session_start();
require_once '../App/init.php';

const BASE_PATH = __DIR__ . '/../';

$router = new Router;
require_once basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
