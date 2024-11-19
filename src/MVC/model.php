<?php
namespace MVC\model;
use MVC\db\db;
class cocaCola{
    private $db;
    public function __construct($db) {
        $db = new db();
    }
    public function getAll(){
        $stmt = $this->db->query("select * from motak;");
        $this->db->close();
        return $stmt;
    }
}