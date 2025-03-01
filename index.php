<?php

require "functions.php";
require "Database.php";
//require "router.php";

$config = require("config.php");

$database = new Database($config["database"]);
$users = $database->query("SELECT * FROM users")->fetchAll();

$id = $_GET["id"];
$query = "SELECT * FROM posts WHERE id=:id";

$posts = $database->query($query, ["id" => $id])->fetchAll();
dd($posts);
