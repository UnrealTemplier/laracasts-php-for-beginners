<?php

use Core\App;
use Core\Container;
use Core\Database;

App::setContainer(new Container());
App::bind(Database::class, function () {
    $config = require basePath('config.php');
    return new Database($config['database']);
});