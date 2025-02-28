<?php

require "functions.php";
//require "router.php";

$dsn = "mysql:host=localhost;port=3306;dbname=demo;charset=utf8mb4";
$pdo = new PDO($dsn, "root");

$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Users:</h3>";
echo "<ul>";
foreach ($users as $user) {
    echo "<li>{$user["name"]}</li>";
}
echo "</ul>";

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Posts:</h3>";
echo "<ul>";
foreach ($posts as $post) {
    echo "<li>{$post["title"]}</li>";
}
echo "</ul>";