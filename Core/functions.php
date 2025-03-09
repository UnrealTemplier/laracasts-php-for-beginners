<?php

use Core\Response;
use Core\Session;

function dd($value, $compactArrayView = true)
{
    echo '<pre>';
    if (is_array($value) && $compactArrayView) {
        print_r($value);
    } else {
        var_dump($value);
    }
    echo '</pre>';
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

function authorize($condition, $statusCode = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($statusCode);
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    return require basePath('views/' . $path);
}

function partial($path, $attributes = [])
{
    $path = 'partials/' . $path;
    return view($path, $attributes);
}

function redirect($path)
{
    http_response_code(Response::REDIRECT);
    header("Location: {$path}");
    exit();
}
