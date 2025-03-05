<?php

namespace Core;

class Container
{
    protected static $bindings = [];
    protected static $instances = [];

    public static function bind($key, $resolver)
    {
        static::$bindings[$key] = $resolver;
    }

    public static function resolve($key)
    {
        if (!array_key_exists($key, static::$bindings)) {
            throw new \Exception("No such binding key: $key");
        }

        if (array_key_exists($key, static::$instances)) {
            return static::$instances[$key];
        }

        $resolver = static::$bindings[$key];
        $instance = $resolver();
        static::$instances[$key] = $instance;

        return $instance;
    }
}