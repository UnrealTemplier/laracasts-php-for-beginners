<?php

namespace Core;

class Router
{
    protected $routes = [];

    protected function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null,
        ];

        return $this;
    }

    protected function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);
        require basePath("views/{$code}.php");
        die();
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($method, $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == $method) {

                if ($route['middleware']) {
                    if ($route['middleware'] === 'guest') {
                        if ($_SESSION['user'] ?? false) {
                            redirectTo('/');
                        }
                    }

                    if ($route['middleware'] === 'auth') {
                        if (!$_SESSION['user'] ?? false) {
                            redirectTo('/');
                        }
                    }
                }

                return require basePath($route['controller']);
            }
        }

        $this->abort();
    }
}
