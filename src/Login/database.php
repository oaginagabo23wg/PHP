<?php
class Database {
    private $conn;

    public function __construct($servername, $username, $password, $dbName) {
        $this->conn = new mysqli($servername, $username, $password, $dbName);
        if ($this->conn->connect_error) {
            die("Error connecting to database: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function close() {
        $this->conn->close();
    }
}
