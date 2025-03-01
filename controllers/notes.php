<?php

$heading = "Notes";

$config = require("config.php");
$db = new Database($config["database"]);

require "views/notes.view.php";