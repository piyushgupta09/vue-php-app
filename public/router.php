<?php

// Route API requests to the server directory
if (preg_match('/^\/api/', $_SERVER['REQUEST_URI'])) {
    require __DIR__ . '/../server/api.php';
    exit;
}

// For any other request, serve the index.html file
require __DIR__ . '/index.html';