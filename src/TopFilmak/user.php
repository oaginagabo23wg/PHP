<?php
class User {
    private $db;

    public function __construct($database) {
        $this->db = $database->getConnection();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare('SELECT id, password FROM user WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                $_SESSION['UserData'] =[
                    'Username' => $username,
                    'id' => $row['id']
                ];
                return true;
            }
        }
        return false;
    }
}
