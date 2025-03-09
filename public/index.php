<?php

use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require basePath("{$class}.php");
});

Session::start();

require basePath('bootstrap.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router = new Router();
require basePath('routes.php');

$router->route($method, $uri);

Session::unflash();
