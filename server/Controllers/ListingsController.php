<?php

require_once __DIR__ . '/../Models/Listing.php';

class ListingsController
{
    private $listing;

    public function __construct()
    {
        $this->listing = new Listing();
    }

    public function getListings()
    {
        echo json_encode($this->listing->getAll());
    }

    public function createListing()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->listing->create($data)) {
            echo json_encode(['id' => $this->listing->getLastInsertId()]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to create listing']);
        }
    }

    public function updateListing()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->listing->update($data)) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update listing']);
        }
    }

    public function deleteListing()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->listing->delete($data['id'])) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete listing']);
        }
    }
}