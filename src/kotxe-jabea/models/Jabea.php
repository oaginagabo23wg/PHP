<?php

namespace Models;

use PDO;
use Config\Database;

class Jabea {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // herri guztien iragarpen egun guztiak, herriaren izenarekin eguna-ren arabera ordenatua
    public function getAll() {
        $query = "SELECT * FROM jabeak";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }   

    public function delete($id) {
        $query = "DELETE FROM jabeak WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }    
}
