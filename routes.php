<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// List of all notes
$router->get('/notes', 'controllers/notes/index.php')->only('auth');

// Show a specific note
$router->get('/note', 'controllers/notes/show.php')->only('auth');

// Create a new note
$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php')->only('auth');

// Edit a specific note
$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');
$router->patch('/note', 'controllers/notes/update.php')->only('auth');

// Delete a note
$router->delete('/note', 'controllers/notes/destroy.php')->only('auth');

// Register a user
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

// Log In
$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/login', 'controllers/session/store.php')->only('guest');

// Log Out
$router->delete('/logout', 'controllers/session/destroy.php')->only('auth');

