<?php

namespace Core\Middleware;

class Middleware
{
    protected const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key)
    {
        $middleware = self::MAP[$key];
        (new $middleware())->handle();
    }
}
