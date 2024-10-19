<?php
require './user.php';
require './film.php';
class Database
{
    private $conn;

    public function __construct($servername, $username, $password, $dbName)
    {
        $this->conn = new mysqli($servername, $username, $password, $dbName);
        if ($this->conn->connect_error) {
            die("Error connecting to database: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function close()
    {
        $this->conn->close();
    }

    public function checkIfExists($table, $column, $value)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM $table WHERE $column = ?");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        return $count > 0;
    }

    public function getAllFilms()
    {
        $films = [];
        $stmt = $this->conn->prepare("SELECT izena, isan, urtea FROM filmak");
        $stmt->execute();
        $stmt->bind_result($izena, $isan, $urtea);

        while ($stmt->fetch()) {
            $films[] = new Film($izena, $isan, $urtea);
        }
        $stmt->close();
        return $films;
    }
    public function insertFilm($izena, $isan, $urtea)
    {
        $sql = "INSERT INTO filmak (izena, isan, urtea) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param('sii', $izena, $isan, $urtea);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function updateFilm($izena, $urtea, $isan){
        $sql = "UPDATE filmak SET izena = ?, urtea = ? WHERE isan = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param('ssi', $izena, $urtea, $isan); 
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function deleteFilm($isan){
        $stmt = $this->conn->prepare("DELETE FROM filmak WHERE isan = ?");
        $stmt->bind_param("s", $isan);
        $stmt->execute();
        $stmt->close();
    }
    public function puntuatuFilm($puntuazioa, $isan, $erab){
        $stmt = $this->conn->prepare("INSERT INTO puntuazioak (puntuazioa, user, film) VALUES (?, ?, ?);");
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param('iii', $puntuazioa, $erab, $isan);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function getPuntuakFilm($id) {
        $stmt = $this->conn->prepare("SELECT p.puntuazioa, f.izena FROM puntuazioak p JOIN filmak f ON p.film = f.isan WHERE p.user = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
}

$database = new Database("db", "root", "root", "mydatabase");
$user = new User($database);
