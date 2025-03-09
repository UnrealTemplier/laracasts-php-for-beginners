<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// List of all notes
$router->get('/notes', 'notes/index.php')->only('auth');

// Show a specific note
$router->get('/note', 'notes/show.php')->only('auth');

// Create a new note
$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');

// Edit a specific note
$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');

// Delete a note
$router->delete('/note', 'notes/destroy.php')->only('auth');

// Register a user
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

// Log In
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');

// Log Out
$router->delete('/logout', 'session/destroy.php')->only('auth');

