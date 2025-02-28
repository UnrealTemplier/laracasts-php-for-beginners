<?php

function dd($value, $compactArrayView = true)
{
    echo "<pre>";
    if (is_array($value) && $compactArrayView) {
        print_r($value);
    } else {
        var_dump($value);
    }
    echo "</pre>";
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}