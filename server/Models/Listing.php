<?php

class Listing
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM listings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO listings (title, description, price) VALUES (:title, :description, :price)");
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        return $stmt->execute();
    }

    public function update($data)
    {
        $stmt = $this->db->prepare("UPDATE listings SET title = :title, description = :description, price = :price WHERE id = :id");
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM listings WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getLastInsertId()
    {
        return $this->db->lastInsertId();
    }
}