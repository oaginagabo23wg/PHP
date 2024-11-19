<?php

namespace Eguraldia\models;

use PDO;
use Eguraldia\Config\Database;

class IragarpenEguna
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function listAllById($id)
    {
        $stmt = $this->db->prepare("SELECT h.izena AS herria, ie.eguna ie.iragarpen_testua, ie.eguraldia, ie.tenperatura_minimoa, ie.tenperatura_maximoa FROM herria h JOIN iragarpena_eguna ie ON h.id = ie.herria_id ORDER BY ie.eguna");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
