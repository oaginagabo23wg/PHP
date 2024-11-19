<?php

namespace MVC\db;

class db
{
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbName = "cocacola";
    public function __construct()
    {
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connected successfully";
    }
}
