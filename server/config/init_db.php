<?php

// Define a secret key
define('SECRET_KEY', 'super-secret-key');

// Check if the secret key is provided and correct
if (!isset($_GET['key']) || $_GET['key'] !== SECRET_KEY) {
    http_response_code(403);
    echo "Forbidden: Invalid secret key.";
    exit;
}

// Create the database table
try {
    $db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
    $db->exec("CREATE TABLE IF NOT EXISTS listings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        description TEXT,
        price REAL
    )");
    echo "Database initialized successfully.";
} catch (PDOException $e) {
    echo "Error initializing database: " . $e->getMessage();
}