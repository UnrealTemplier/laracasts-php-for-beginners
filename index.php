<?php

require "functions.php";
require "Database.php";
//require "router.php";

$config = require("config.php");

$database = new Database($config["database"]);
$users = $database->query("SELECT * FROM users")->fetchAll();

echo "<h3>Users:</h3>";
echo "<ul>";
foreach ($users as $user) {
    echo "<li>{$user["name"]}</li>";
}
echo "</ul>";


$posts = $database->query("SELECT * FROM posts")->fetchAll();

echo "<h3>Posts:</h3>";
echo "<ul>";
foreach ($posts as $post) {
    echo "<li>{$post["title"]}</li>";
}
echo "</ul>";