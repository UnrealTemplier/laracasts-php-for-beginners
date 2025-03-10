<?php

use Core\Container;

test('Container could resolve something', function () {
    Container::bind('foo', fn() => 'foo');
    $result = Container::resolve('foo');
    expect($result)->toBe('foo');
});