<?php
require './user.php';
require './film.php';
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

    public function checkIfExists($table, $column, $value) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM $table WHERE $column = ?");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        return $count > 0;
    }

    public function getAllFilms() {
        $films = [];
        $stmt = $this->conn->prepare("SELECT izena, isan, urtea, puntuazioa FROM films"); // Cambia "films" por el nombre de tu tabla
        $stmt->execute();
        $stmt->bind_result($izena, $isan, $urtea, $puntuazioa);

        while ($stmt->fetch()) {
            $films[] = new Film($izena, $isan, $urtea, $puntuazioa);
        }

        $stmt->close();
        return $films;
    }
}

$database = new Database("db", "root", "root", "mydatabase");
$user = new User($database);
