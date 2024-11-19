<?php

namespace Eguraldia\models;

use PDO;
use Eguraldia\Config\Database;

class Herria
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM herria");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function create($izena)
    {
        $stmt = $this->db->prepare("INSERT INTO herria (izena) VALUES (:izena)");
        $stmt->bindParam(':izena', $izena, PDO::PARAM_STR);
        $stmt->execute();
    }
    // public function getOne($id){
    //     $stmt = $this->db->prepare("SELECT * FROM herria WHERE id = :id");
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetch();
    // }
    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM herria WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
