<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// List of all notes
$router->get('/notes', 'controllers/notes/index.php');

// Show a specific note
$router->get('/note', 'controllers/notes/show.php');

// Create a new note
$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

// Edit a specific note
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

// Delete a note
$router->delete('/note', 'controllers/notes/destroy.php');

