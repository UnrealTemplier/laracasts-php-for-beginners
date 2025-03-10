<?php

use Core\Container;

test('Container could not resolve something', function () {
    Container::bind('one', fn() => 'one');
    $result = Container::resolve('one');
    expect($result)->toBe('two');
});
