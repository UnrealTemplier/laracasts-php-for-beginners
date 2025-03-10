<?php

namespace Core;

use Core\Middleware\Middleware;

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

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
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

    /**
     * @throws ValidationException
     */
    public function route($method, $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == $method) {

                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }

                return require basePath('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }
}
