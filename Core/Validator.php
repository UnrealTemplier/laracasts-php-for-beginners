<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $strLength = strlen(trim($value));
        return $strLength >= $min && $strLength <= $max;
    }

    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function url($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}