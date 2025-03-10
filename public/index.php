<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

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

try {
    $router->route($method, $uri);
} catch (ValidationException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);

    redirect($router->previousUrl());
}

Session::unflash();
