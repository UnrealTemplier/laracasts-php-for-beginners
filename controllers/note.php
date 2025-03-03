<?php

$heading = "Note";
$currentUserId = 1;

$config = require("config.php");
$db = new Database($config["database"]);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_GET["id"],
])->findOrFail();

if ($note["user_id"] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";