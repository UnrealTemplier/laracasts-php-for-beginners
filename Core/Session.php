<?php

namespace Core;

class Session
{
    protected const FLASH_KEY = '_flash';

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (isset($_SESSION[self::FLASH_KEY][$key])) {
            return $_SESSION[self::FLASH_KEY][$key];
        }

        return $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {
        $_SESSION[self::FLASH_KEY][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION[self::FLASH_KEY]);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        self::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    public static function start()
    {
        session_start();
    }
}
