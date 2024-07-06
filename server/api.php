<?php

require_once __DIR__ . '/Controllers/ListingsController.php';

// Debugging output: print the request method and headers
error_log('Request Method: ' . $_SERVER['REQUEST_METHOD']);
error_log('Request Headers: ' . json_encode(apache_request_headers()));

// Only allow requests that come from XMLHttpRequest (XHR) or fetch API
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    http_response_code(403);
    echo json_encode(['error' => 'Forbidden']);
    exit;
}

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$controller = new ListingsController();

switch ($method) {
    case 'GET':
        error_log('Handling GET request');
        $controller->getListings();
        break;
    case 'POST':
        error_log('Handling POST request');
        $controller->createListing();
        break;
    case 'PUT':
        error_log('Handling PUT request');
        $controller->updateListing();
        break;
    case 'DELETE':
        error_log('Handling DELETE request');
        $controller->deleteListing();
        break;
    default:
        error_log('Invalid Method: ' . $method);
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}